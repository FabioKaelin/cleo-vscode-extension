<?php

// include("../enter.php");
class User{
    private $personID;
    private $firstname;
    private $lastname;
    private $kurzel;
    private $status;
    private $project;
    private $database;
    private $currentStamp;
    private $stamps;

    function __construct($firstname, $lastname, $personID, $database){
        $this->firstname = strtolower($firstname);
        $this->lastname = strtolower($lastname);
        $this->personID = $personID;
        $this->database = $database;
        $this->kurzel = substr(strtolower($firstname), 0, 3) . substr(strtolower($lastname), 0, 3);
        $this->updateTasks();
        $this->getCurrentTask();




        $query = "SELECT id, ende FROM stamps WHERE personIDFS = {$this->personID} ORDER BY start DESC LIMIT 1";
        $result = $this->database->execquery($query);
        while($row = mysqli_fetch_assoc($result)) {
            if ($row["ende"]){
                $this->status = false;
            } else {
                $this->status = true;
            }
        }
    }

    private function getCurrentTask(){
        $query = "SELECT id, personIDFS, ende, project FROM stamps WHERE personIDFS = {$this->personID} ORDER BY start DESC LIMIT 1;";
        $result = $this->database->execquery($query);
        $row = mysqli_fetch_assoc($result);
        if (!empty($row["id"])){
            if (empty($row["ende"])){
                foreach ($this->stamps as $key => $value) {
                    if($value->getStampID() == $row["id"]){
                        $this->currentStamp = $value;
                    }
                }
            }
        }
    }

    private function updateTasks(){
        $query = "SELECT id FROM stamps";
        $result = $this->database->execquery($query);
        $stamps = [];
        while($row = mysqli_fetch_assoc($result)) {
            $newStamp = new Stamp($this->database, $row["id"]);
            $stamps[] = $newStamp;
        }
        $this->stamps = $stamps;
    }

    public function getDurchschnitt(){
        $query = "SELECT ROUND(AVG(TIMESTAMPDIFF(DAY,start,ende))) AS 'day', ROUND(AVG(TIMESTAMPDIFF(HOUR,start,ende))) AS 'hour', ROUND(AVG(TIMESTAMPDIFF(MINUTE,start,ende))) AS 'minute',  ROUND(AVG(TIMESTAMPDIFF(SECOND,start,ende))) AS 'second' FROM stamps WHERE personIDFS = {$this->personID} AND ende IS NOT NULL;";
        $result = $this->database->execquery($query);
        $row = mysqli_fetch_assoc($result);
        $day = $row["day"];
        $hour = $row["hour"];
        $minute = $row["minute"];
        $second = $row["second"];

        while (strlen("$second") < 2){
            $second = "0$second";
        }
        while (strlen("$minute") < 2){
            $minute = "0$minute";
        }
        while (strlen("$hour") < 2){
            $hour = "0$hour";
        }
        if ($day == 0){
            return "$hour:$minute:$second";
        } else {
            return "$day - $hour:$minute:$second";
        }
    }

    public function getFirstname(){
        return $this->firstname;
    }
    public function getLastname(){
        return $this->lastname;
    }
    public function getKurzel(){
        return $this->kurzel;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getProject(){
        return $this->project;
    }
    public function nachtragen($datumzeit){
        if($this->status == true){
            //online jetzt ausbadgen
            $this->status = false;
            $this->currentStamp->ende($datumzeit);
            enter();
            echo $this->currentStamp->getTime();
            enter();

        }else if ($this->status == false){
            //offline jetzt einbadgen
            $this->status = true;
            $this->currentStamp = new Stamp($this->database);
            $this->currentStamp->create($this->personID, $datumzeit);
        }

    }
    public function stempel(){
        if ($this->status == false){
            //offline jetzt einbadgen
            $this->status = true;
            $this->currentStamp = new Stamp($this->database);
            $this->currentStamp->create($this->personID);
        } else if ($this->status == true){
            //online jetzt ausbadgen
            $this->status = false;
            $this->currentStamp->ende();
            enter();
            echo $this->currentStamp->getTime();
            enter();

        }
    }
}
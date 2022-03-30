# Cleo

Meine Katze heisst Cleo.

## Nutzung

### Cleo Json

**Man hat fünf Varianten um den Cleo Json zu öffnen.**

Variante 1: Mit dem Context-Menü im Editor

Variante 2: Mit dem Context-Menü vom Editor-Tap

Variante 3: Mit dem Context-Menü vom Explorer

Variante 4: Mit der Tastenkombination <kbd>Ctrl</kbd>+<kbd>j</kbd> or on Mac <kbd>⌘ Command</kbd>+<kbd>j</kbd>

Variante 5: Mit dem Command ```Open with Cleo-Json```

Hinweis: Die ersten vier Varianten funktionieren nur wenn man ein Json-File offen hat.

<!-- <p float="left">
    <img src="https://github.com/FabioKaelin/cleo-vscode-extension/blob/main/Screenshots/Editor-Context.png?raw=true" alt="drawing" style="width:30%;"/>
    <img src="https://github.com/FabioKaelin/cleo-vscode-extension/blob/main/Screenshots/editor-Title-Context.png?raw=true" alt="drawing" style="width:30%;"/>
    <img src="https://github.com/FabioKaelin/cleo-vscode-extension/blob/main/Screenshots/Explorer-Context.png?raw=true" alt="drawing" style="width:30%;"/>
 -->


<p float="left" >
    <div class="gallery">
        <figure class="img1 figurefx pushup">
            <img src="https://github.com/FabioKaelin/cleo-vscode-extension/blob/main/Screenshots/Editor-Context.png?raw=true" alt="Editor Context-Menü" />
            <figcaption>Editor Context-Menü</figcaption>
        </figure>
        <figure class="img2 figurefx pushup">
            <img src="https://github.com/FabioKaelin/cleo-vscode-extension/blob/main/Screenshots/editor-Title-Context.png?raw=true" alt="Editor Title Context-Menü" />
            <figcaption>Editor Title Context-Menü</figcaption>
        </figure>
        <figure class="img3 figurefx pushup">
            <img src="https://github.com/FabioKaelin/cleo-vscode-extension/blob/main/Screenshots/Explorer-Context.png?raw=true" alt="Explorer Context-Menü" />
            <figcaption>Explorer Context-Menü</figcaption>
        </figure>
    </div>
</p>

<style>
    .gallery {
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        grid-template-rows:auto;
        grid-gap: 0px;
        justify-items: start;
    }
    .figurefx{
        z-index: 10;
    }
    .img1 {
        z-index: 10;
        grid-area: 1/1/2/2;
    }
    .img2 {
        z-index: 10;
        grid-area: 1/2/2/3;
    }
    .img3 {
        z-index: 10;
        grid-area: 1/3/2/4;
    }
    figure>img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
    .img1:hover{
        z-index: 100;
        align-self: left;
        justify-self: left;
    }
    .img2:hover{
        z-index: 100;
        align-self: center;
        justify-self: center;
    }
    .img3:hover{
        z-index: 100;
        align-self: right;
        justify-self: right;
    }
    .pushup:hover{
        width: 300%;
    }
    figure {
        padding: 0;
        display: block;
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }
    figcaption {
        position: absolute;
        display: block;
        color: transparent;
        bottom: 0%;
        overflow: hidden;
        text-align: center;
        font-size: medium;
    }
    figure:hover>figcaption {
        color:white;
        background: rgba(58, 58, 58, 0.466);
        bottom: 0%;
        overflow: hidden;
        width: 100%;
        margin-right: 5%;
    }
</style>

[GitHub repository](https://github.com/FabioKaelin/cleo-vscode-extension.git)

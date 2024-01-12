<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-header-with-alignment@1.0.1/dist/bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-paragraph-with-alignment@3.0.0/dist/bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@1.9.0/dist/list.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.9.0/dist/image.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@2.3.0/dist/table.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@2.9.0/dist/code.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@1.4.0/dist/marker.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@1.5.0/dist/inline-code.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-tooltip"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/text-variant-tune@1.0.1/dist/text-variant-tune.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@editorjs/text-variant-tune@1.0.1/src/styles/index.min.css">
<script src="https://cdn.jsdelivr.net/npm/editorjs-drag-drop"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-undo"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-style@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-layout@1.2.5/dist/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/raw@2.5.0/dist/raw.umd.min.js"></script>


<style>
    .codex-editor {
        background: #fff;
        border: solid 1px #ddd;
        padding: 10px !important;

    }

    .codex-editor__redactor {
        padding-bottom: 100px !important;
    }

    .ce-editorjsColumns_col {
        flex: 50%
    }

    .ce-editorjsColumns_wrapper {
        display: flex;
        width: 100%;
        gap: 10px;
        margin-bottom: 10px;
        flex-direction: row
    }

    .ce-editorjsColumns_wrapper .ce-toolbar__actions {
        z-index: 0
    }

    .ce-editorjsColumns_wrapper .ce-toolbar {
        z-index: 4
    }

    .ce-editorjsColumns_wrapper .ce-popover {
        z-index: 4000
    }

    @media(max-width: 800px) {
        .ce-editorjsColumns_wrapper {
            flex-direction: column;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px
        }
    }

    .ce-inline-toolbar {
        z-index: 1000
    }

    .ce-block__content,
    .ce-toolbar__content {
        max-width: calc(100% - 50px)
    }


    .codex-editor--narrow .codex-editor__redactor {
        margin: 0
    }

    .ce-toolbar {
        z-index: 4
    }

    .codex-editor {
        border: none;
        max-width: 90%;
        margin: 0 auto;
        z-index: auto !important
    }

    :not(dialog) .codex-editor {

        max-width: 90%;
        padding: 100;

    }



    dialog {
        height: 50vh;
    }

    dialog .codex-editor {
        max-width: 85% !important;
        margin: 0 auto;
    }
</style>

 
<script>
    if (document.querySelector('#jseditor') !== null) {

        document.querySelector('#jseditor').insertAdjacentHTML('beforebegin', `<div id="editorjs"></div><br><a href="https://ko-fi.com/I3I2RHQZS' target='_blank"><img height="36" style="border:0px;height:36px;margin-top:10px;margin-left:auto;margin-right:0;display:block;margin-bottom:10px;" src="https://storage.ko-fi.com/cdn/kofi3.png?v=1" border="0" alt="Buy Me a Coffee at ko-fi.com" /></a>`);

        document.querySelector('#jseditor').style.display = 'none';




        const editor = new EditorJS({

            onReady: () => {
                new Undo({
                    editor
                });
                new DragDrop(editor);
            },


            onChange: (api, event) => {
                saveData()
            },

            /** 
             * Id of Element that should contain the Editor 
             */
            holder: 'editorjs',

            tools: {



                style: EditorJSStyle.StyleInlineTool,

                header: {
                    class: Header,
                    config: {
                        placeholder: 'Enter a header',
                        levels: [1, 2, 3, 4, 5],
                        defaultLevel: 3,
                        defaultAlignment: 'left'
                    }
                },
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: true,
                },

                list: {
                    class: List,
                    inlineToolbar: true,
                    config: {
                        defaultStyle: 'unordered'
                    }
                },


                table: {
                    class: Table,
                    inlineToolbar: true,
                    config: {
                        rows: 2,
                        cols: 3,
                    },
                },

                code: CodeTool,


                Marker: {
                    class: Marker,
                    shortcut: 'CMD+SHIFT+M',
                },

                inlineCode: {
                    class: InlineCode,
                    shortcut: 'CMD+SHIFT+M',
                },

                tooltip: {
                    class: Tooltip,
                    config: {
                        location: 'left',
                        highlightColor: '#FFEFD5',
                        underline: true,
                        backgroundColor: '#154360',
                        textColor: '#FDFEFE',
                        holder: 'editorId',
                    }
                },


                image: {
                    class: SimpleImage,
                    inlineToolbar: true
                },


            },

        });


        async function saveData() {
            try {
                const savedData = await editor.save();
                console.log(editor.save());
                const html = convertToHTML(savedData);
                document.getElementById('jseditor').value = html;
            } catch (error) {
                console.error('Error saving data:', error);
            }
        }

        function convertToHTML(savedData) {
            return savedData.blocks.map(block => {
                switch (block.type) {
                    case 'paragraph':
                        return `<p style="text-align:${block.data.alignment}">${block.data.text}</p>`;



                    case 'header':
                        return `<h${block.data.level} style="text-align:${block.data.alignment}">${block.data.text}</h${block.data.level}>`;

                    case 'list':
                        return `<${block.data.style === 'ordered' ? 'ol' : 'ul'}>${block.data.items.map(item => `<li>${item}</li>`).join('')}</${block.data.style === 'ordered' ? 'ol' : 'ul'}>`;

                    case 'image':
                        const classes = [
                            block.data.stretched ? 'stretched' : '',
                            block.data.withBackground ? 'with-background' : '',
                            block.data.withBorder ? 'with-border' : '',
                        ].filter(Boolean).join(' ');

                        return `<img src="${block.data.url}"  alt="${block.data.caption || ''}" class="${classes}" >`;

                    case 'table':
                        return `<table>${block.data.content.map(row => `<tr>${row.map(cell => `<td>${cell}</td>`).join('')}</tr>`).join('')}</table>`;

                    case 'code':
                        return `<pre><code>${block.data.code}</code></pre>`;

                        // Add cases for other block types as needed
                    default:
                        return '';
                }
            }).join('');
        }

        function convertFromHTML(html) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            const blocks = [];

            doc.body.childNodes.forEach(node => {
                if (node.nodeType === Node.ELEMENT_NODE) {
                    const blockType = determineBlockType(node);
                    const blockData = extractBlockData(node, blockType);

                    blocks.push({
                        type: blockType,
                        data: blockData,
                    });
                }
            });

            return {
                blocks
            };
        }

        function determineBlockType(node) {
            switch (node.tagName.toLowerCase()) {
                case 'p':
                    return 'paragraph';

               

                case 'h1':
                case 'h2':
                case 'h3':
                case 'h4':
                case 'h5':
                case 'h6':
                    return 'header';
                case 'ul':
                case 'ol':
                    return 'list';
                case 'li':
                    // Check if the parent is a ul or ol
                    return node.parentNode.tagName.toLowerCase() === 'ul' ? 'list' : 'list';
                case 'img':
                    return 'image';
                case 'table':
                    return 'table';
                case 'pre':
                    // Check if it's a code block or inline code
                    return node.querySelector('code') ? 'code' : 'paragraph';
                default:
                    return 'paragraph'; // Default to paragraph for unrecognized elements
            }
        }

        function extractBlockData(node, blockType) {
            switch (blockType) {
                case 'paragraph':
                    return {
                        text: node.innerHTML
                    };
                case 'header':
                    return {
                        text: node.innerHTML, level: parseInt(node.tagName.charAt(1))
                    };
                case 'list':
                    return {
                        style: node.tagName.toLowerCase() === 'ol' ? 'ordered' : 'unordered', items: Array.from(node.childNodes).map(item => item.textContent.trim())
                    };
                case 'image':
                    return {

                        url: node.getAttribute('src'),
                            caption: node.getAttribute('alt'),

                            withBackground: node.getAttribute('class') == 'with-background' ? true : false,
                            withBorder: node.getAttribute('class') == 'with-border' ? true : false,
                            stretched: node.getAttribute('class') == 'stretched' ? true : false,


                    };
                case 'table':
                    const rows = Array.from(node.querySelectorAll('tr')).map(row =>
                        Array.from(row.querySelectorAll('td')).map(cell => cell.textContent.trim())
                    );
                    return {
                        content: rows
                    };
                case 'code':
                    return {
                        code: node.querySelector('code').textContent.trim()
                    };
                default:
                    return {};
            }
        }
        if (document.querySelector('#jseditor').value !== '') {
            editor.isReady
                .then(() => {
                    editor.blocks.render(convertFromHTML(document.querySelector('#jseditor').value));
                });
        };



        function runImage(i) {
            event.preventDefault();
            console.log('test');
            const name = document.querySelectorAll('.information .text-secondary')[i].innerHTML;
            editor.blocks.insert('image', {
                url: '<?php echo DOMAIN_BASE . HTML_PATH_UPLOADS; ?>' + 'pages/' + document.querySelector('#jsuuid').value + '/' + name
            });
            $('#jsmediaManagerModal').modal('hide');


        }


        function runThumbImage(i) {
            event.preventDefault();
            console.log('test');
            const name = document.querySelectorAll('.information .text-secondary')[i].innerHTML;
            editor.blocks.insert('image', {
                url: '<?php echo DOMAIN_BASE . HTML_PATH_UPLOADS; ?>' + 'pages/' + document.querySelector('#jsuuid').value + '/thumbnails/' + name
            });
            $('#jsmediaManagerModal').modal('hide');


        }

        window.addEventListener('load', () => {

            setInterval(() => {
                document.querySelectorAll('#jsbluditMediaTable .information ').forEach((x, i) => {


                    x.querySelector('a:nth-child(1)').setAttribute('onclick', `runImage(${i})`)
                    x.querySelector('a:nth-child(2)').setAttribute('onclick', `runThumbImage(${i})`)
                });
            }, 300)


        });

    };
</script>
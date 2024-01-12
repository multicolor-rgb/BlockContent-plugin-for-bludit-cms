<?php

global $security;
$tokenCSRF = $security->getTokenCSRF();; ?>

<script>
    if (document.querySelector('#jseditor') !== null) {

        document.querySelector('#jseditor').insertAdjacentHTML('beforebegin', `<div id="editorjs"></div><br><a href="https://ko-fi.com/I3I2RHQZS' target='_blank"><img height="36" style="border:0px;height:36px;margin-top:10px;margin-left:auto;margin-right:0;display:block;margin-bottom:10px;" src="https://storage.ko-fi.com/cdn/kofi3.png?v=1" border="0" alt="Buy Me a Coffee at ko-fi.com" /></a>`);

        document.querySelector('#jseditor').style.display = 'none';





        let e = {
            tools: {
                raw: RawTool,
                style: EditorJSStyle.StyleInlineTool,
                header: {
                    class: Header,
                    config: {
                        placeholder: "Enter a header",
                        levels: [1, 2, 3, 4, 5],
                        defaultLevel: 3,
                        defaultAlignment: "left"
                    }
                },

                image: {
                    class: ImageTool,

                    config: {

                        uploader: {
                            uploadByFile(file) {
                                const formData = new FormData();
                                formData.append("image", file);
                                formData.append("tokenCSRF", tokenCSRF); // Add the CSRF token to the form data
                                formData.append("uuidfolder", document.querySelector('#jsuuid').value); // Add the CSRF token to the form data

                                return fetch(uploadurl, {
                                    credentials: 'same-origin',
                                    method: "POST",
                                    body: formData,

                                }).then(data => {
                                    console.log(file.name);
                                    return {
                                        success: 1,
                                        file: {
                                            url: `<?php echo DOMAIN_BASE; ?>bl-content/uploads/pages/${document.querySelector('#jsuuid').value}/${file.name}` // Assuming the response contains the file URL
                                        }
                                    };

                                })
                            },
                        },
                    },
                },

                paragraph: {
                    class: Paragraph,
                    inlineToolbar: !0
                },
                list: {
                    class: List,
                    inlineToolbar: !0,
                    config: {
                        defaultStyle: "unordered"
                    }
                },
                table: {
                    class: Table,
                    inlineToolbar: !0,
                    config: {
                        rows: 2,
                        cols: 3
                    }
                },
                code: CodeTool,
                Marker: {
                    class: Marker,
                    shortcut: "CMD+SHIFT+M"
                },
                inlineCode: {
                    class: InlineCode,
                    shortcut: "CMD+SHIFT+M"
                },
                tooltip: {
                    class: Tooltip,
                    config: {
                        location: "left",
                        highlightColor: "#FFEFD5",
                        underline: !0,
                        backgroundColor: "#154360",
                        textColor: "#FDFEFE",
                        holder: "editorId"
                    }
                },

            },
        };
        var t = new EditorJS({
            onReady() {
                new Undo({
                    editor: t
                }), new DragDrop(t);
            },
            onChange(e, t) {
                a();
            },
            holder: "editorjs",
            data: {
                blocks: [{
                        type: "header",
                        data: {
                            text: "Put yours content"
                        }
                    },
                    {
                        type: "paragraph",
                        data: {
                            text: "<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in fringilla odio, quis faucibus turpis. Aenean efficitur lobortis velit nec bibendum. Nullam dignissim quam vitae lectus lacinia, sed eleifend urna faucibus. Etiam imperdiet molestie magna, eget ultricies nisl scelerisque eget. Aliquam rutrum cursus ligula sit amet luctus. Aenean pulvinar faucibus porta. Curabitur tristique neque nec aliquam fermentum. Donec sit amet lacus porttitor, posuere nisl consectetur, suscipit tellus. Donec a leo egestas, scelerisque arcu eget, gravida nunc. In tristique elementum dolor ut tempor. Nunc ultricies dictum semper.</b> ",
                        },
                    },
                    {
                        type: "paragraph",
                        data: {
                            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in fringilla odio, quis faucibus turpis. Aenean efficitur lobortis velit nec bibendum. Nullam dignissim quam vitae lectus lacinia, sed eleifend urna faucibus. Etiam imperdiet molestie magna, eget ultricies nisl scelerisque eget. Aliquam rutrum cursus ligula sit amet luctus. Aenean pulvinar faucibus porta. Curabitur tristique neque nec aliquam fermentum. Donec sit amet lacus porttitor, posuere nisl consectetur, suscipit tellus. Donec a leo egestas, scelerisque arcu eget, gravida nunc. In tristique elementum dolor ut tempor. Nunc ultricies dictum semper. ",
                        },
                    },
                ],
            },
            tools: {
                raw: RawTool,
                style: EditorJSStyle.StyleInlineTool,
                header: {
                    class: Header,
                    config: {
                        placeholder: "Enter a header",
                        levels: [1, 2, 3, 4, 5],
                        defaultLevel: 3,
                        defaultAlignment: "left"
                    }
                },
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: !0
                },
                list: {
                    class: List,
                    inlineToolbar: !0,
                    config: {
                        defaultStyle: "unordered"
                    }
                },
                table: {
                    class: Table,
                    inlineToolbar: !0,
                    config: {
                        rows: 2,
                        cols: 3
                    }
                },
                code: CodeTool,
                Marker: {
                    class: Marker,
                    shortcut: "CMD+SHIFT+M"
                },
                inlineCode: {
                    class: InlineCode,
                    shortcut: "CMD+SHIFT+M"
                },
                tooltip: {
                    class: Tooltip,
                    config: {
                        location: "left",
                        highlightColor: "#FFEFD5",
                        underline: !0,
                        backgroundColor: "#154360",
                        textColor: "#FDFEFE",
                        holder: "editorId"
                    }
                },
                image: {
                    class: ImageTool,
                    config: {
                        uploader: {
                            uploadByFile(file) {
                                const formData = new FormData();
                                formData.append("image", file);
                                formData.append("tokenCSRF", tokenCSRF); // Add the CSRF token to the form data
                                formData.append("uuidfolder", document.querySelector('#jsuuid').value); // Add the CSRF token to the form data

                                return fetch(uploadurl, {
                                    credentials: 'same-origin',
                                    method: "POST",
                                    body: formData,

                                }).then(data => {
                                    console.log(file.name);
                                    return {
                                        success: 1,
                                        file: {
                                            url: `<?php echo DOMAIN_BASE; ?>bl-content/uploads/pages/${document.querySelector('#jsuuid').value}/${file.name}` // Assuming the response contains the file URL
                                        }
                                    };

                                })
                            },
                        },
                    },
                },
                twoColumns: {
                    class: EditorJSLayout.LayoutBlockTool,
                    config: {
                        EditorJS,
                        editorJSConfig: e,
                        enableLayoutEditing: !1,
                        enableLayoutSaving: !1,
                        initialData: {
                            itemContent: {
                                1: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                                2: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                            },
                            layout: {
                                type: "container",
                                id: "",
                                className: "row twocolumns",
                                style: "border: 1px solid #ddd; display: flex; padding: 16px; ",
                                children: [{
                                        type: "item",
                                        id: "",
                                        className: "col-md-6",
                                        style: "border: 1px solid #ddd; padding: 8px; ",
                                        itemContentId: "1"
                                    },
                                    {
                                        type: "item",
                                        id: "",
                                        className: "col-md-6",
                                        style: "border: 1px solid #ddd; padding: 8px; ",
                                        itemContentId: "2"
                                    },
                                ],
                            },
                        },
                    },
                    shortcut: "ctrl+alt+1",
                    toolbox: {
                        icon: `
       <svg xmlns='http://www.w3.org/2000/svg' width="16" height="16" viewBox='0 0 512 512'>
         <rect x='128' y='128' width='336' height='336' rx='57' ry='57' fill='none' stroke='currentColor' stroke-linejoin='round' stroke-width='32'/>
         <path d='M383.5 128l.5-24a56.16 56.16 0 00-56-56H112a64.19 64.19 0 00-64 64v216a56.16 56.16 0 0056 56h24' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
       </svg>
     `,
                        title: "6/6 columns",
                    },
                },


                twoCenter: {
                    class: EditorJSLayout.LayoutBlockTool,
                    config: {
                        EditorJS,
                        editorJSConfig: e,
                        enableLayoutEditing: !1,
                        enableLayoutSaving: !1,
                        initialData: {
                            itemContent: {
                                1: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                                2: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                            },
                            layout: {
                                type: "container",
                                id: "",
                                className: "row twocenter align-items-center",
                                style: "border: 1px solid #ddd; display: flex; padding: 16px; ",
                                children: [{
                                        type: "item",
                                        id: "",
                                        className: "col-md-6",
                                        style: "border: 1px solid #ddd; padding: 8px; ",
                                        itemContentId: "1"
                                    },
                                    {
                                        type: "item",
                                        id: "",
                                        className: "col-md-6",
                                        style: "border: 1px solid #ddd; padding: 8px; ",
                                        itemContentId: "2"
                                    },
                                ],
                            },
                        },
                    },
                    shortcut: "ctrl+alt+9",
                    toolbox: {
                        icon: `
       <svg xmlns='http://www.w3.org/2000/svg' width="16" height="16" viewBox='0 0 512 512'>
         <rect x='128' y='128' width='336' height='336' rx='57' ry='57' fill='none' stroke='currentColor' stroke-linejoin='round' stroke-width='32'/>
         <path d='M383.5 128l.5-24a56.16 56.16 0 00-56-56H112a64.19 64.19 0 00-64 64v216a56.16 56.16 0 0056 56h24' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
       </svg>
     `,
                        title: "6/6 center",
                    },
                },

                twoColumns84: {
                    class: EditorJSLayout.LayoutBlockTool,
                    config: {
                        EditorJS,
                        editorJSConfig: e,
                        enableLayoutEditing: !1,
                        enableLayoutSaving: !1,
                        initialData: {
                            itemContent: {
                                1: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                                2: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                            },
                            layout: {
                                type: "container",
                                id: "",
                                className: "row",
                                style: "border: 1px solid #ddd; display: flex;   padding: 16px; ",
                                children: [{
                                        type: "item",
                                        id: "",
                                        className: "col-md-8",
                                        style: "border: 1px solid  #ddd; padding: 8px; ",
                                        itemContentId: "1"
                                    },
                                    {
                                        type: "item",
                                        id: "",
                                        className: "col-md-4",
                                        style: "border: 1px solid  #ddd; padding: 8px; ",
                                        itemContentId: "2"
                                    },
                                ],
                            },
                        },
                    },
                    shortcut: "ctrl+alt+2",
                    toolbox: {
                        icon: `
       <svg xmlns='http://www.w3.org/2000/svg' width="16" height="16" viewBox='0 0 512 512'>
         <rect x='128' y='128' width='336' height='336' rx='57' ry='57' fill='none' stroke='currentColor' stroke-linejoin='round' stroke-width='32'/>
         <path d='M383.5 128l.5-24a56.16 56.16 0 00-56-56H112a64.19 64.19 0 00-64 64v216a56.16 56.16 0 0056 56h24' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
       </svg>
     `,
                        title: "8/4 columns",
                    },
                },
                twoColumns48: {
                    class: EditorJSLayout.LayoutBlockTool,
                    config: {
                        EditorJS,
                        editorJSConfig: e,
                        enableLayoutEditing: !1,
                        enableLayoutSaving: !1,
                        initialData: {
                            itemContent: {
                                1: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                                2: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                            },
                            layout: {
                                type: "container",
                                id: "",
                                className: "row",
                                style: "border: 1px solid  #ddd; display: flex;  padding: 16px; ",
                                children: [{
                                        type: "item",
                                        id: "",
                                        className: "col-md-4",
                                        style: "border: 1px solid  #ddd; padding: 8px; ",
                                        itemContentId: "1"
                                    },
                                    {
                                        type: "item",
                                        id: "",
                                        className: "col-md-8",
                                        style: "border: 1px solid  #ddd; padding: 8px; ",
                                        itemContentId: "2"
                                    },
                                ],
                            },
                        },
                    },
                    shortcut: "ctrl+alt+3",
                    toolbox: {
                        icon: `
       <svg xmlns='http://www.w3.org/2000/svg' width="16" height="16" viewBox='0 0 512 512'>
         <rect x='128' y='128' width='336' height='336' rx='57' ry='57' fill='none' stroke='currentColor' stroke-linejoin='round' stroke-width='32'/>
         <path d='M383.5 128l.5-24a56.16 56.16 0 00-56-56H112a64.19 64.19 0 00-64 64v216a56.16 56.16 0 0056 56h24' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
       </svg>
     `,
                        title: "4/8 columns",
                    },
                },
                threeColumns: {
                    class: EditorJSLayout.LayoutBlockTool,
                    config: {
                        EditorJS,
                        editorJSConfig: e,
                        enableLayoutEditing: !1,
                        enableLayoutSaving: !1,
                        initialData: {
                            itemContent: {
                                1: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                                2: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                                3: {
                                    blocks: [{
                                            type: "header",
                                            data: {
                                                text: "Some Title"
                                            }
                                        },
                                        {
                                            type: "paragraph",
                                            data: {
                                                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis condimentum dui, a elementum est. "
                                            }
                                        },
                                    ],
                                },
                            },
                            layout: {
                                type: "container",
                                id: "",
                                className: "row",
                                style: "border: 1px solid  #ddd; display: flex ; padding: 16px; ",
                                children: [{
                                        type: "item",
                                        id: "",
                                        className: "col-md-4",
                                        style: "border: 1px solid  #ddd; ",
                                        itemContentId: "1"
                                    },
                                    {
                                        type: "item",
                                        id: "",
                                        className: "col-md-4",
                                        style: "border: 1px solid  #ddd; ",
                                        itemContentId: "2"
                                    },
                                    {
                                        type: "item",
                                        id: "",
                                        className: "col-md-4",
                                        style: "border: 1px solid  #ddd; ",
                                        itemContentId: "3"
                                    },
                                ],
                            },
                        },
                    },
                    shortcut: "ctrl+alt+4",
                    toolbox: {
                        icon: `
       <svg xmlns='http://www.w3.org/2000/svg' width="16" height="16" viewBox='0 0 512 512'>
         <rect x='128' y='128' width='336' height='336' rx='57' ry='57' fill='none' stroke='currentColor' stroke-linejoin='round' stroke-width='32'/>
         <path d='M383.5 128l.5-24a56.16 56.16 0 00-56-56H112a64.19 64.19 0 00-64 64v216a56.16 56.16 0 0056 56h24' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/>
       </svg>
     `,
                        title: "4/4/4 columns",
                    },
                },
            },
        });
        async function a() {
            try {
                let e = await t.save();
                console.log(t.save());
                let a = l(e);
                document.getElementById("jseditor").value = a;
            } catch (i) {
                console.error("Error saving data:", i);
            }
        }

        function l(e) {
            return e.blocks
                .map((e) => {
                    switch (e.type) {
                        case "paragraph":
                            return `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                        case "raw":
                            return `<div class="rawdata">${e.data.html}</div>`;
                        case "header":
                            return `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level}>`;
                        case "list":
                            return `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                        case "image":
                            let t = [e.data.stretched == true ? "stretched" : "", e.data.withBackground == true ? "with-background" : "", e.data.withBorder == true ? "with-border" : ""].filter(Boolean).join(" ");
                            return `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                        case "table":
                            return `<table class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`;
                        case "code":
                            return `<pre><code>${e.data.code}</code></pre>`;
                        case "twoColumns":
                            let a = '<div class="row twocolumns">';
                            return (
                                (a += '<div class="col-md-6">'),
                                e.data.itemContent[1].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) a += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) a += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) a += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) a += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.file.stretched ? "stretched" : "", e.data.file.withBackground ? "with-background" : "", e.data.file.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        a += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (a += `<table class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (a += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (a += "</div>"),
                                (a += '<div class="col-md-6">'),
                                e.data.itemContent[2].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) a += `<p style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) a += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) a += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) a += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.file.stretched ? "stretched" : "", e.data.file.withBackground ? "with-background" : "", e.data.file.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        a += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (a += `<table class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (a += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (a += "</div>"),
                                (a += "</div>")
                            );


                        case "twoCenter":
                            let ac = '<div class="row twocenter align-items-center">';
                            return (
                                (ac += '<div class="col-md-6">'),
                                e.data.itemContent[1].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) ac += `<p style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) ac += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) ac += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) ac += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.file.stretched ? "stretched" : "", e.data.file.withBackground ? "with-background" : "", e.data.file.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        ac += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (ac += `<table class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (ac += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (ac += "</div>"),
                                (ac += '<div class="col-md-6">'),
                                e.data.itemContent[2].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) ac += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) ac += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) ac += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) ac += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.data.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        ac += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (ac += `<table class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (a += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (ac += "</div>"),
                                (ac += "</div>")
                            );

                        case "threeColumns":
                            let l = '<div class="row threecolumns">';
                            return (
                                (l += '<div class="col-md-4">'),
                                e.data.itemContent[1].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) l += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) l += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) l += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) l += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.data.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        l += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (l += `<table class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (l += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (l += "</div>"),
                                (l += '<div class="col-md-4">'),
                                e.data.itemContent[2].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) l += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) l += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) l += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) l += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.data.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        l += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (l += `<table class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (l += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (l += "</div>"),
                                (l += '<div class="col-md-4 threecolumns">'),
                                e.data.itemContent[3].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) l += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) l += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) l += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) l += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.data.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        l += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (l += `<table  class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (l += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (l += "</div>"),
                                (l += "</div>")
                            );
                        case "twoColumns84":
                            let i = '<div class="row twoColumns84">';
                            return (
                                (i += '<div class="col-md-8">'),
                                e.data.itemContent[1].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) i += `<p style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) i += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) i += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) i += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.data.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        i += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (i += `<table  class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (i += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (i += "</div>"),
                                (i += '<div class="col-md-4">'),
                                e.data.itemContent[2].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) i += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) i += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) i += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) i += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        i += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (i += `<table  class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (i += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (i += "</div>"),
                                (i += "</div>")
                            );
                        case "twoColumns48":
                            let r = '<div class="row twoColumns48">';
                            return (
                                (r += '<div class="col-md-4">'),
                                e.data.itemContent[1].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) r += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) r += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) r += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) r += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.data.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        r += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (r += `<table  class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (r += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (r += "</div>"),
                                (r += '<div class="col-md-8">'),
                                e.data.itemContent[2].blocks.forEach((e) => {
                                    if ("paragraph" == e.type) r += `<p style="${e.data.alignment  ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</p>`;
                                    else if ("raw" == e.type) r += `<div class="rawdata">${e.data.html}</div>`;
                                    else if ("header" == e.type) r += `<h${e.data.level ?? 3} style="${e.data.alignment ? `text-align:${e.data.alignment}` : ``}">${e.data.text}</h${e.data.level ?? 3}>`;
                                    else if ("list" == e.type) r += `<${"ordered" === e.data.style ? "ol" : "ul"}>${e.data.items.map((e) => `<li>${e}</li>`).join("")}</${"ordered" === e.data.style ? "ol" : "ul"}>`;
                                    else if ("image" == e.type) {
                                        let t = [e.data.stretched ? "stretched" : "", e.data.withBackground ? "with-background" : "", e.data.withBorder ? "with-border" : ""].filter(Boolean).join(" ");
                                        r += `<img src="${e.data.file.url}"  alt="${e.data.file.caption || ""}" class="${t}" >`;
                                    } else
                                        "table" == e.type ?
                                        (r += `<table  class="table">${e.data.content.map((e) => `<tr>${e.map((e) => `<td>${e}</td>`).join("")}</tr>`).join("")}</table>`) :
                                        "code" == e.type && (r += `<pre><code>${e.data.code}</code></pre>`);
                                }),
                                (r += "</div>"),
                                (r += "</div>")
                            );
                        default:
                            return "";
                    }
                })
                .join("");
        }

        function i(e) {
            let t = new DOMParser(),
                a = t.parseFromString(e, "text/html"),
                l = [];
            return (
                a.body.childNodes.forEach((e) => {
                    if (e.nodeType === Node.ELEMENT_NODE) {
                        let t = r(e),
                            a = o(e, t);
                        l.push({
                            type: t,
                            data: a
                        });
                    }
                }), {
                    blocks: l
                }
            );
        }

        function r(e) {
            switch (e.tagName.toLowerCase()) {
                case "p":
                default:
                    return "paragraph";
                case "h1":
                case "h2":
                case "h3":
                case "h4":
                case "h5":
                case "h6":
                    return "header";
                case "ul":
                case "ol":
                    return "list";
                case "div":
                    if (e.className.includes("twocolumns")) {
                        return "twoColumns";
                    } else if (e.className.includes("twocenter")) {
                        return "twoCenter";
                    } else if (e.className.includes("threecolumns")) {
                        return "threeColumns";
                    } else if (e.className.includes("twoColumns84")) {
                        return "twoColumns84";
                    } else if (e.className.includes("twoColumns48")) {
                        return "twoColumns48";
                    } else {
                        return "raw";
                    }
                case "li":
                    return e.parentNode.tagName.toLowerCase(), "list";
                case "img":
                    return "image";
                case "table":
                    return "table";
                case "pre":
                    return e.querySelector("code") ? "code" : "paragraph";
            }
        }

        function o(e, t) {
            switch (t) {
                case "paragraph":
                    return {
                        text: e.innerHTML,
                            alignment: e.style.textAlign
                    };
                case "header":
                    return {
                        text: e.innerHTML, level: parseInt(e.tagName.charAt(1)),
                            alignment: e.style.textAlign
                    };
                case "raw":
                    return {
                        html: e.innerHTML
                    };
                case "list":
                    return {
                        style: "ol" === e.tagName.toLowerCase() ? "ordered" : "unordered", items: Array.from(e.childNodes).map((e) => e.textContent.trim())
                    };
                case "image":
                    return {
                        withBorder: e.classList.contains('with-border'),
                            stretched: e.classList.contains('stretched'),
                            withBackground: e.classList.contains('with-background'),
                            file: {
                                url: e.getAttribute("src"),
                                caption: e.getAttribute("alt"),
                            },
                    };
                case "table":
                    let a = Array.from(e.querySelectorAll("tr")).map((e) => Array.from(e.querySelectorAll("td")).map((e) => e.textContent.trim()));
                    return {
                        content: a
                    };
                case "code":
                    return {
                        code: e.querySelector("code").textContent.trim()
                    };
                case "twoColumns":
                    JSON.stringify(i(e.querySelector(".col-md-6").innerHTML));
                    let l = i(e.querySelectorAll(".col-md-6")[0].innerHTML),
                        r = i(e.querySelectorAll(".col-md-6")[1].innerHTML);
                    return {
                        itemContent: {
                            1: l,
                            2: r
                        }
                    };
                case "twoCenter":
                    JSON.stringify(i(e.querySelector(".col-md-6").innerHTML));
                    let o = i(e.querySelectorAll(".col-md-6")[0].innerHTML),
                        d = i(e.querySelectorAll(".col-md-6")[1].innerHTML);
                    return {
                        itemContent: {
                            1: o,
                            2: d
                        }
                    };
                case "threeColumns":
                    let s = i(e.querySelectorAll(".col-md-4")[0].innerHTML),
                        n = i(e.querySelectorAll(".col-md-4")[1].innerHTML),
                        c = i(e.querySelectorAll(".col-md-4")[2].innerHTML);
                    return {
                        itemContent: {
                            1: s,
                            2: n,
                            3: c
                        }
                    };
                case "twoColumns84":
                    let u = i(e.querySelector(".col-md-8").innerHTML),
                        m = i(e.querySelector(".col-md-4").innerHTML);
                    return {
                        itemContent: {
                            1: u,
                            2: m
                        }
                    };
                case "twoColumns48":
                    let p = i(e.querySelector(".col-md-4").innerHTML),
                        h = i(e.querySelector(".col-md-8").innerHTML);
                    return {
                        itemContent: {
                            1: p,
                            2: h
                        }
                    };
                default:
                    return {};
            }
        }




        if (document.querySelector('#jseditor').value !== '') {
            t.isReady
                .then(() => {
                    t.blocks.render(i(document.querySelector('#jseditor').value));
                });
        };


        document.querySelector('#jsmediaManagerOpenModal').remove();



        window.addEventListener('load', () => {

            setInterval(() => {
                document.querySelectorAll('#jsbluditMediaTable .information ').forEach((x, i) => {


                });
            }, 300)


        });

    };
</script>
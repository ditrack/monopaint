(function () {
    if (window.addEventListener) {
        window.addEventListener('load', function () {
            var canvas, context, canvaso, contexto, picture;

            // default values
            var tool;
            var toolDefault = 'pencil';
            var lineDefault = 1;

            function init() {
                canvaso = document.getElementById('drawingCanvas');
                if (!canvaso) {
                    alert('Error! Canvas not found');
                    return;
                }

                if (!canvaso.getContext) {
                    alert('Error! canvas.getContext not found');
                    return;
                }

                contexto = canvaso.getContext('2d');
                if (!contexto) {
                    alert('Error! Can not get getContext');
                    return;
                }

                var container = canvaso.parentNode;
                canvas = document.createElement('canvas');
                if (!canvas) {
                    alert('Error! Can not create canvas element');
                    return;
                }

                canvas.id = 'imageTemp';
                canvas.width = canvaso.width;
                canvas.height = canvaso.height;
                container.appendChild(canvas);

                context = canvas.getContext('2d');

                // get tools
                var toolSelect = document.getElementsByName('tool');
                if (!toolSelect) {
                    alert('Error! Element tools not found!');
                    return;
                }

                for (var i = 0; i < toolSelect.length; i++) {
                    toolSelect[i].addEventListener('click', evToolChange, false);
                }

                // active default draw tool
                if (tools[toolDefault]) {
                    tool = new tools[toolDefault]();
                    toolSelect.value = toolDefault;
                }

                // init line width
                var toolSize = document.getElementsByName('size');
                if (!toolSize) {
                    alert('Error! Can not create canvas element');
                    return;
                }

                for (var i = 0; i < toolSize.length; i++) {
                    toolSize[i].addEventListener('click', evSizeChange, false);
                }

                context.lineWidth = lineDefault;

                // init update picture
                picture = document.getElementById('picture');

                if (picture) {
                    loadPicture();
                }

                document.getElementById('clear').addEventListener('click', clear, false);

                canvas.addEventListener('mousedown', evCanvas, false);
                canvas.addEventListener('mousemove', evCanvas, false);
                canvas.addEventListener('mouseup', evCanvas, false);
            }

            function evCanvas(ev) {
                if (ev.layerX || ev.layerX == 0) {
                    ev._x = ev.layerX;
                    ev._y = ev.layerY;
                } else if (ev.offsetX || ev.offsetX == 0) {
                    ev._x = ev.offsetX;
                    ev._y = ev.offsetY;
                }

                var func = tool[ev.type];
                if (func) {
                    func(ev);
                }
            }

            // set clicked tool
            function evToolChange(ev) {
                if (tools[this.value]) {
                    tool = new tools[this.value]();
                }
            }

            // clear imageTemp.
            function imgUpdate() {
                contexto.drawImage(canvas, 0, 0);
                context.clearRect(0, 0, canvas.width, canvas.height);
                document.getElementById("canvasData").value = canvaso.toDataURL("image/png");
            }

            // clear image
            function clear() {

                if (picture) {
                    loadPicture();
                }

                contexto.clearRect(0, 0, canvas.width, canvas.height);
            }

            // change line width
            function evSizeChange() {
                context.lineWidth = this.dataset.size;
            }

            function loadPicture() {
                var img = new Image();

                img.onload = function () {
                    context.drawImage(img, 10, 10);
                };

                img.src = picture.value;
            }

            // init tools
            var tools = {};

            // pencil
            tools.pencil = function () {
                var tool = this;
                this.started = false;

                // start draw
                this.mousedown = function (ev) {
                    context.beginPath();
                    context.moveTo(ev._x, ev._y);
                    tool.started = true;
                };

                this.mousemove = function (ev) {
                    if (tool.started) {
                        context.lineTo(ev._x, ev._y);
                        context.stroke();
                    }
                };

                this.mouseup = function (ev) {
                    if (tool.started) {
                        tool.mousemove(ev);
                        tool.started = false;
                        imgUpdate();
                    }
                };
            };

            // rectangle
            tools.rect = function () {
                var tool = this;
                this.started = false;

                this.mousedown = function (ev) {
                    tool.started = true;
                    tool.x0 = ev._x;
                    tool.y0 = ev._y;
                };

                this.mousemove = function (ev) {
                    if (!tool.started) {
                        return;
                    }

                    var x = Math.min(ev._x, tool.x0),
                        y = Math.min(ev._y, tool.y0),
                        w = Math.abs(ev._x - tool.x0),
                        h = Math.abs(ev._y - tool.y0);

                    context.clearRect(0, 0, canvas.width, canvas.height);

                    if (!w || !h) {
                        return;
                    }

                    context.strokeRect(x, y, w, h);
                };

                this.mouseup = function (ev) {
                    if (tool.started) {
                        tool.mousemove(ev);
                        tool.started = false;
                        imgUpdate();
                    }
                };
            };

            // line
            tools.line = function () {
                var tool = this;
                this.started = false;

                this.mousedown = function (ev) {
                    tool.started = true;
                    tool.x0 = ev._x;
                    tool.y0 = ev._y;
                };

                this.mousemove = function (ev) {
                    if (!tool.started) {
                        return;
                    }

                    context.clearRect(0, 0, canvas.width, canvas.height);

                    context.beginPath();
                    context.moveTo(tool.x0, tool.y0);
                    context.lineTo(ev._x, ev._y);
                    context.stroke();
                    context.closePath();
                };

                this.mouseup = function (ev) {
                    if (tool.started) {
                        tool.mousemove(ev);
                        tool.started = false;
                        imgUpdate();
                    }
                };
            };

            // circle
            tools.circle = function () {
                var tool = this;
                this.started = false;

                this.mousedown = function (ev) {
                    tool.started = true;
                    tool.x0 = ev._x;
                    tool.y0 = ev._y;
                };

                this.mousemove = function (ev) {
                    if (!tool.started) {
                        return;
                    }

                    var radius = Math.sqrt(Math.pow(tool.x0 - ev._x, 2) + Math.pow(tool.y0 - ev._y, 2));
                    context.clearRect(0, 0, canvas.width, canvas.height);
                    context.beginPath();
                    context.arc(tool.x0, tool.y0, radius, 0, 2 * Math.PI, false);
                    context.stroke();
                    context.closePath();
                };

                this.mouseup = function (ev) {
                    if (tool.started) {
                        tool.mousemove(ev);
                        tool.started = false;
                        imgUpdate();
                    }
                };
            };

            init();

        }, false);
    }
})();
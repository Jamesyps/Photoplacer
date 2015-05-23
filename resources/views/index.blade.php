<!doctype html>
<html itemscope itemtype="http://schema.org/WebPage" lang="en">
<head>
    <meta charset="utf-8"/>

    <!-- Basic Info -->
    <title>Photoplacer</title>
    <meta name="description" content="{description}">
    <meta name="keywords" content="A light weight Lumen application for embedding temporary images in a web template. Host your own stock images for use in your design & development workflow" />
    <!-- ./Basic Info -->

    <!-- Schema.org -->
    <meta itemprop="name" content="Photoplacer">
    <meta itemprop="description" content="A light weight Lumen application for embedding temporary images in a web template. Host your own stock images for use in your design & development workflow">
    <!-- ./Schema.org -->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- ./Devices -->

    <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700' rel='stylesheet' type='text/css'>

    <!--[if gte IE 9]><!-->
    <link rel="stylesheet" media="screen" href="/css/main.css" />
    <!--<![endif]-->
</head>

<body>

    <h1 class="logo">
        <img src="/images/logo.png" srcset="/images/logo@2x.png 2x" alt="Placephoto" />
    </h1>

    <div class="url-builder">
        <strong class="url-builder__title">Use the options below to create your placeholder image code</strong>

        <form class="form" action="">
            <div class="form__row dimensions">
                <div class="field width">
                    <label for="width" class="label">Width</label>
                    <input type="text" name="x" class="text-field field-x" id="width" value="100" />
                </div>
                <span class="divider">
                    &times;
                </span>
                <div class="field height">
                    <label for="height" class="label">Height</label>
                    <input type="text" name="y" class="text-field field-y" id="height" value="100"/>
                </div>
            </div>

            <div class="form__row options">
                <div class="field category">
                    <label for="category" class="label">Category</label>
                    <select class="select-field category" name="category" id="category">
                        <option value="any">Any</option>
                        <option value="nature">Nature</option>
                        <option value="city">City</option>
                        <option value="animals">Animals</option>
                        <option value="people">People</option>
                    </select>
                </div>
                <div class="field filter">
                    <span class="label">Filter</span>
                    <label class="toggle-field">
                        <input class="toggle filter-input" type="radio" name="filter" value="none" checked="checked"/>
                        None
                    </label>

                    <label class="toggle-field">
                        <input class="toggle filter-input" type="radio" name="filter" value="greyscale" />
                        Greyscale
                    </label>

                    <label class="toggle-field">
                        <input class="toggle filter-input" type="radio" name="filter" value="invert" />
                        Invert
                    </label>

                    <label class="toggle-field">
                        <input class="toggle filter-input" type="radio" name="filter" value="blur" />
                        Blur
                    </label>

                    <label class="toggle-field">
                        <input class="toggle filter-input" type="radio" name="filter" value="pixelate" />
                        Pixelate
                    </label>
                </div>
            </div>
        </form>

        <div class="preview">
            <div class="thumb">
                <img src="http://placehold.it/320x320" />
            </div>
            <div class="output-container">
                <span class="label">URL</span>
                <div class="output">
                    Hello world
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        // Thank you - http://weblog.west-wind.com/posts/2011/Apr/22/Restricting-Input-in-HTML-Textboxes-to-Numeric-Values
        jQuery.fn.forceNumeric = function () {

            return this.each(function () {
                $(this).keydown(function (e) {
                    var key = e.which || e.keyCode;

                    if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                                // numbers
                            key >= 48 && key <= 57 ||
                                // Numeric keypad
                            key >= 96 && key <= 105 ||
                                // comma, period and minus, . on keypad
                            key == 190 || key == 188 || key == 109 || key == 110 ||
                                // Backspace and Tab and Enter
                            key == 8 || key == 9 || key == 13 ||
                                // Home and End
                            key == 35 || key == 36 ||
                                // left and right arrows
                            key == 37 || key == 39 ||
                                // Del and Ins
                            key == 46 || key == 45)
                        return true;

                    return false;
                });
            });
        };

        (function($) {

            // Urls
            var document_url = document.URL;
            var url_structure = "{width}x{height}{category}{filter}";

            // Inputs
            var $width = $('.field-x');
            var $height = $('.field-y');
            var $category = $('.category');
            var $filter = $('.filter-input');

            // Defaults
            var widthVal = 100;
            var heightVal = 100;
            var categoryVal = '';
            var filterVal = '';

            $width.forceNumeric().on('keyup', setWidth);
            $height.forceNumeric().on('keyup', setHeight);
            $category.on('change', setCategory);
            $filter.on('change', setFilter);

            function setWidth() {
                var newWidth = $(this).val();

                if(newWidth != widthVal)
                {
                    widthVal = newWidth;
                    updateUrl();
                }
            }

            function setHeight() {
                var newHeight = $(this).val();

                if(newHeight != heightVal)
                {
                    heightVal = newHeight;
                    updateUrl();
                }
            }

            function setCategory() {
                categoryVal = ($(this).val() == 'any') ? '' : '/' + $(this).val();
                updateUrl();
            }

            function setFilter() {
                filterVal = ($(this).val() == 'none') ? '' : '/filter:' + $(this).val();
                updateUrl();
            }

            function updateUrl() {
                var url = url_structure.replace('{width}', widthVal)
                        .replace('{height}', heightVal)
                        .replace('{category}', categoryVal)
                        .replace('{filter}', filterVal);

                $('.output').text(document_url + url);
                $('.thumb img').attr('src', document_url + url);
            };

            updateUrl();

        })(jQuery);
    </script>
    <!-- ./Scripts -->

</body>
</html>

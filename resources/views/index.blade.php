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
                        <option>Any</option>
                        <option>Nature</option>
                        <option>City</option>
                        <option>Animals</option>
                        <option>People</option>
                    </select>
                </div>
                <div class="field filter">
                    <span class="label">Filter</span>
                    <label class="toggle-field">
                        <input class="toggle" type="radio" name="filter" value="false" checked="checked"/>
                        None
                    </label>

                    <label class="toggle-field">
                        <input class="toggle" type="radio" name="filter" value="greyscale" />
                        Greyscale
                    </label>

                    <label class="toggle-field">
                        <input class="toggle" type="radio" name="filter" value="invert" />
                        Invert
                    </label>

                    <label class="toggle-field">
                        <input class="toggle" type="radio" name="filter" value="blur" />
                        Blur
                    </label>

                    <label class="toggle-field">
                        <input class="toggle" type="radio" name="filter" value="pixelate" />
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

</body>
</html>
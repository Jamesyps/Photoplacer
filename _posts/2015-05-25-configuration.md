---
layout: post
title:  "Configuration"
date:   2015-05-25 19:00
---

The application is configured by a .env file in the document root. If this has not been created, copy .env.example and 
rename it ".env".

{% highlight bash %}
APP_ENV=local
APP_DEBUG=true

IMAGES_PATH=imagebank
IMAGES_DEFAULT_X=800
IMAGES_DEFAULT_Y=600
IMAGES_MAX_X=1400
IMAGES_MAX_Y=1400


IMAGE_FILTERS=true
IMAGE_FILTERS_BLUR=5
IMAGE_FILTERS_PIXELATE=10
{% endhighlight %}
    
### APP_ENV

This sets the application environment. It is recommended this is not set to local when in production.

### APP_DEBUG

As above, set this to false when not running locally.

### IMAGES_PATH

This is where your image library is set relative to `/storage/app`. From the example above the full path would be:

`/storage/app/imagebank`

### IMAGES\_DEFAULT_X

Here you can define the default image width that is returned on certain invalid requests (for example, exceeding the maximum size 
limits).

### IMAGES\_DEFAULT_Y

Here you can define the default image height that is returned on certain invalid requests (for example, exceeding the maximum size 
limits).

### IMAGES\_MAX_X

Due to memory limitations, you may wish to control how large an image is able to be created by the application. This value
prevents users from exceeding a defined width.

### IMAGES\_MAX_Y

Due to memory limitations, you may wish to control how large an image is able to be created by the application. This value
prevents users from exceeding a defined height.

### IMAGE_FILTERS

This setting allows you to globally disable filters from being applied. Existing images will still work, but will lose
their styling.

### IMAGE\_FILTERS_BLUR

Sets the blur filter intensity. *Warning: Blur is a resource intensive filter, be careful setting large values as your 
memory limits may cause image generation to fail.*

### IMAGE\_FILTERS_PIXELATE
Sets the pixelation filter intensity.

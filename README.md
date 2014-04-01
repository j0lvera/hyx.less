# Hyx.less v1.0

Hyx is a [**LESS**](http://lesscss.org) mixing function that creates a modular grid system with flexible gutter.

## Features

- Easy installation & customization
- Flexible gutter size, you can change it very easily
- Built thinking to use only what you need
- Infinite nesting
- Fluid layout
- [RWD](http://alistapart.com/article/responsive-web-design/) friendly!
- Pre Build Grid example included

## How to Use

### Installation

Download or clone the repo and copy the `hyx.less` file into your less folder, then import it on your main `style.less` file.


```css
@import 'hyx';
```

### Settings

Set your gutter size in `%`, or leave it as is and default `1%` will be used.

```css 
@gutter: 2%; 
```

From here you can uncomment the pre-built grid and start using the classes.

```css
/**
 * Pre Build Grid
 * Uncomment only what you need
 */
// .col-1-2  { .cols(6); }  /* one of two */
// .col-1-3  { .cols(4); }  /* one of three */
// .col-1-4  { .cols(3); }  /* one of four */
// .col-1-6  { .cols(2); }  /* one of six */
// .col-1-12 { .cols(1); }  /* one of twelve */
```

### Example

```css 
/* Style */

@import 'hyx';
@gutter: 4%; /* You can change this setting any time you want, the grid will work perfectly without other adjustment */

// .col-1-2  { .cols(6); }  /* one of two */
   .col-1-3  { .cols(4); }  /* one of three <-- I only need this one */
// .col-1-4  { .cols(3); }  /* one of four */
// .col-1-6  { .cols(2); }  /* one of six */
// .col-1-12 { .cols(1); }  /* one of twelve */
```

```html
<!-- Markup -->

<div class="row"> <!-- necessary class to wrap the columns -->
    <div class="col-1-3"> <!-- class that include our .cols(4); result -->
        <p> First column </p>
    </div>
    
    <div class="col-1-3">
        <p> Second column </p>
    </div>

    <div class="col-1-3">
        <p> Third column </p>
    </div>
</div> <!-- .row -->
```

## Custom Classes

Otherwise, if you want to create your custom class name or different column sizes, you will need to use the mixing `.cols()` that accepts an integer parameter equivalent to the size of the column.

### Requirements

- **Class**. You can assign the class name prefix that you want, for example `.col-1-4` or `.one-of-four`, that means one of four, or a prefix like this `.col-4` that means four columns.

- **Parameter**. You can use whatever divisible by 12 or not `;)`, imagine that you want two divs of text that you want to be displayed side by side in a two column layout but different size, something close to 60% - 40%, one for content and another for the sidebar: 

### Example

```css 
/**
 * Modular
 */
.col-8 { .cols(8); } /* <div id="content" class="col-8"></div> */
.col-4 { .cols(4); } /* <div id="sidebar" class="col-4"></div> */
```

```css
/** 
 * Semantic
 */
#content { .cols(8); } /* <div id="content"></div> */
#sidebar { .cols(4); } /* <div id="sidebar"></div> */
```

```css
/**
 * Both
 */
.col-8 { .cols(8); }
.col-4 { .cols(4); }

#content { &:extend(.col-8); } /* <div id="content"></div> */
#sidebar { &:extend(.col-4); } /* <div id="sidebar"></div> */
```

## Demo

[Demo Page](http://thinkxl.github.io/hyx)

## Why?

I did this tiny snippet after [Andy Taylor](http://andytaylor.me/) shutted down [cssgrid](http://cssgrid.net), highly inspired on [this post from CSS Tricks](http://css-tricks.com/dont-overthink-it-grids/).

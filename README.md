# Hyx.less

A [LESS](http://lesscss.org) Mixing that Creates a Fluid Grid System.

## Features

- Flexible gutter size: you can change it whenever you want and your grid won't break.
- Keeps your DOM clean and semantic; Hyx.less will not fill your HTML with a bunch of classes.
- Powerful and easy to understand syntax, `.cols(1/3);` means one column of three.
- Use only what you need when you need it. This is a tool to build a grid ad-hoc to your needs. You are not stuck with a rigid API or only one way to build your grid.
- Nested grids
- Custom namespaces 

## Quick start

### Installation

1. Download the latest stable release from [http://thinkxl.github.io/hyx.less/](http://thinkxl.github.io/hyx.less/) or clone the git repo - `git clone https://github.com/thinkxl/hyx.less.git`
2. Copy `Hyx.less` file from the repo or unzipped folder
3. Paste it in your less folder
4. Import it on your main `style.less`

```css
// style.less

@import `hyx`;
```

### How to use

In the top of `style.less`, specify some settings:

```css
// ## Grid setup

@gutter: 4%; // global gutter, required
```

## Let's build our first grid

Cols.less has been designed to build an entire grid only with one function. It can take a parameter in two ways, fractions and integeres.

The main function is `.cols(@size);`, and the two ways that you can input the size of your grid is separated by two syntax styles:

- Same size grid
- Different size grid

#### Same size

This means that all your columns will have the same size, and they need to be separated in the same distance one from each other. 

The syntax used to build a grid of three columns could be:

```css
.cols(1/3); // one of three;

// example using it with a class in a semantic named way
.col-1-3 { .cols(1/3); }
```

This means one column of three and the function will have the `width` of each element in `%` needed. Hyx.less will automatically assign a `margin-right: 0;` to the last element. This way, you can avoid using an extra `.last` class.

#### Different size

With this syntax we are targeting columns of different size, one common scenario is the main content column plus the sidebar one:

```css
.cols(8); // size of eight columns
.cols(4, 0); // size of four columns, plus a `margin-right: 0;`

// example using them with a class well named

.main-content { .cols(8); }
.sidebar { .cols(4, 0); }
```

Just seeing the code it can tell us what is happening, for same size grids we can use `1/3` for one of three, and for one column with the size of eight we can use just `8` as a parameter, let see those in action.

*This is better explained in the API section.*

#### Building an real example

[You can preview it here](http://codepen.io/thinkxl/full/acvtn/)

`style.less`

```css
.col-1-3 {
	// # Same size syntax
	//
	// Means one of three elements with the same size.
	.cols(1/3);
}

.main { 
	// # Different size syntax
	//
	// Means element with the size of eight columns.
	.cols(8); 
}

.sidebar { 
	// # Different size last element syntax
	//
	// Means element with the size of eight columns without gutter. 
	// The second parameter refers to `margin-right: 0;`.
	.cols(4, 0); 
}
```

compiled to `style.css`

```css
.col-1-3 {
  float: left;
  width: 30.666666666666668%;
  margin-right: 4%;
}
.col-1-3:last-child {
  margin-right: 0;
}

.main {
  float: left;
  width: 65.33333333333333%;
  margin-right: 4%;
}

.sidebar {
  float: left;
  width: 30.666666666666668%;
  margin-right: 0;
}
	
```
`index.html`

```html
<section>
  <div class="row"> <!-- necessary class to wrap the columns -->
    <div class="main">
      <p>Main content here!</p>
      <code>.cols(8);</code>
    </div> <!-- .main -->

    <aside class="sidebar">
      <p>Sidebar</p>
      <code>.cols(4);</code>
    </aside> <!-- .sidebar -->
  </div> <!-- .row -->

  <hr />

  <div class="row"> 
    <div class="col-1-3">
      <p> First column </p>
      <code>.cols(1/3);</code>
    </div> <!-- .col-1-3 -->

    <div class="col-1-3">
      <p> Second column </p>
      <code>.cols(1/3);</code>
    </div> <!-- .col-1-3 -->

    <div class="col-1-3">
      <p> Third column </p>
      <code>.cols(1/3);</code>
    </div> <!-- .col-1-3 -->
  </div> <!-- .row -->
</section>
```

[Live example here](http://codepen.io/thinkxl/full/acvtn/)

[More examples](http://codepen.io/collection/CqJar/)

## API

### COLS

*(@size, @in-gutter, @global-gutter)*

- **@size:** Number of columns that we want.
- **@in-gutter**: We use this to set the last element to `margin-right: 0;` without loose the precision of the grid size that the `@global-gutter;` gave us.
- **@global-gutter**: By default this is taken from `@gutter` at the `// settings` we define in the beginning, if we want an element without gutter at all, we set this to `0`.

`.cols();` Is the core and main function, it can create any combination of columns you want in two different syntax's: **same size** & **different size**.

#### Same size syntax

`.cols(1/3);` Meaning one of three, we can use any combination based on a grid of twelve columns, example:

- `.cols(1/3);` *one of three*
- `.cols(1/4);` *one of four* 
- `.cols(1/2);` *one of two* 

This function includes `&:last-child { margin-right: 0; }` inside the class, so we don't have to worry to set `margin-right: 0;` in the last element.

**Usage**

```css
// namespace, I recommend this but you can use whatever you want
.col-1-3 {

  // function that will compile the size needed in %
  .cols(1/3);
}
```

#### Different size syntax

`.cols(4);` This create an element with the size of the columns defined, in this example means that we want an element with the size of four columns.

It takes the gutter from the `@gutter` we define in the `// settings` to make the correct calculation. For avoid breaking the grid we need to add a second parameter in the last element as I explain below.

**Usage**

```css
// namespace, it can be .eight, .grid-8, or whatever you want
.col-8 {
  .cols(8);
}
```

#### Different size last element

`.cols(4, 0);` This function is to use only for the last element using the *different size* syntax, the second parameter applies a `margin-right: 0;` to this element, example:

```css
	.main {
		.cols(8);
	}
	
	.sidebar {
		// last element
		.cols(4, 0);
	}
```
or

```css
	.first-of-three { 
		.cols(4); 
	}
	
	.second-of-three { 
		.cols(4); 
	}
	
	.last-of-three { 
		// last element
		.cols(4, 0); 
	}
```

#### Grid without gutter

You can set the setting `@gutter: 0;`, but then why I need this ugly function with three parameters?

Because sometimes you need the main `@gutter: 4%;` as a general setting, but maybe you want a grid inside the website without gutter that won't affect the other grids, right?

`.cols(4, 0, 0);` Sets all the gutters inside the function to `0` so only this element won't have any gutter, and all other grids if exist won't be affected.

If you want something shorter and nicer, you can use `.span()` more info below.

### SPAN

`.span(@size);` 

- **@size:** Number of columns that we want.

As explained above, this is an alias for `.cols(4, 0, 0);` to make a grid without gutter.

## Extras

### BOX-SIZING

`.box-sizing();`

Sets the box-sizing property to border-box.
For more information, read [Inheriting box-sizing Probably Slightly Better Best-Practice](http://css-tricks.com/inheriting-box-sizing-probably-slightly-better-best-practice/)

Compile to:

```css
html {
  box-sizing: border-box;
}
*, *:before, *:after {
  box-sizing: inherit;
}
```

### EDIT

`.edit();`

Copied from [Jeet](http://jeet.gs), and as their page describes; Edit mode assigns a light gray, semi-transparent, background to every element on the page. It's a little trick picked up over the years that makes visualizing the structure of your site trivial.

##  TODO

- [ ] accept `@color` parameter on `.edit();`
- [ ] port *shift, unshift, center, stack, unstack &amp; align* from [Jeet](http://jeet.gs)

## License

Copyright (c) 2014 [Juan Olvera](http://jolv.me)  
Licensed under the MIT license.

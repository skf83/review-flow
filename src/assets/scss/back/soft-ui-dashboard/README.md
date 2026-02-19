## In order to add a new style, the following changes needs to be made:

1. First, add your colors in the '@global/resources/_colors.scss'-file


2. Go to line 218 in 'back/soft-ui-dashboard/_typography.scss' and add you own: 

```
.text-gradient {
  background-clip: $text-gradient-bg-clip;
  -webkit-background-clip: $text-gradient-bg-clip;
  -webkit-text-fill-color: $text-gradient-text-fill;
  position: $text-gradient-position;
  z-index: $text-gradient-zindex;

  &.text-primary {
    background-image: $text-gradient-bg-primary;
  }
  
  // insert your own here...
  
}
```

3. Go to line 137 in 'back/soft-ui-dashboard/_fixed-plugin.scss' and add you own:

```
.btn.bg-gradient-deep-sea:not(:disabled):not(.disabled){
  border: 1px solid transparent;
  &:not(.active){
  background-color: transparent;
    background-image: none;
    border: 1px solid $deep-sea;
    color: $deep-sea;
  }
}

// insert your own here...
  
```
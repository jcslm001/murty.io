<?php if(!defined('KIRBY')) exit ?>

# Link item

title: Link
pages: true
files: true
fields:
  title: 
    label: Link Title
    type:  text
  date:
    label: Date (YYYYMMDD)
    type:  text
  tags:
  	label: Tags (CSV)
  	type:  text
  link:
     label: URL
     type:  text
  text: 
    label: Description
    type:  textarea
    size:  large
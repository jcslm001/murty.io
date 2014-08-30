<?php if(!defined('KIRBY')) exit ?>

# Blog posts

title: Post
pages: true
files: true
fields:
  title: 
    label: Post Title
    type:  text
  date:
    label: Date (YYYYMMDD)
    type:  text
  tags:
  	label: Tags (CSV)
  	type:  text
  thumbnail:
    label: Thumbnail (Just filename)
    type:  text
  text: 
    label: Content
    type:  textarea
    size:  large
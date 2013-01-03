---
layout: page
title: Hello World!
tagline: Supporting tagline
---
{% include JB/setup %}

Read [Jekyll Quick Start](http://jekyllbootstrap.com/usage/jekyll-quick-start.html)

Complete usage and documentation available at: [Jekyll Bootstrap](http://jekyllbootstrap.com)

## Update Author Attributes

In `_config.yml` remember to specify your own data:
    
    title : My Blog =)
    
    author :
      name : Name Lastname
      email : blah@email.test
      github : username
      twitter : username

The theme should reference these variables whenever needed.
    
## Sample Posts

This blog contains sample posts which help stage pages and blog data.
When you don't need the samples anymore just delete the `_posts/core-samples` folder.

    $ rm -rf _posts/core-samples

Here's a sample "posts list".

<ul class="posts">
  {% for post in site.posts %}
    <li><span>{{ post.date | date_to_string }}</span> &raquo; <a href="{{ BASE_PATH }}{{ post.url }}">{{ post.title }}</a></li>
  {% endfor %}
</ul>

## To-Do

This theme is still unfinished. If you'd like to be added as a contributor, [please fork](http://github.com/plusjade/jekyll-bootstrap)!
We need to clean up the themes, make theme usage guides with theme-specific markup examples.

<div class="row-fluid">
<ul class="thumbnails">
  <li class="span4">
    <div class="thumbnail">
      <img src="/img/food.jpg" class="spinto-editable" id="food-image" />
      <div class="caption spinto-editable" id="left-column">
        <h3>Réfection de fauteuils</h3>
        <p>The Denver Times said: <i>"This bar is our
          goto spot for the best food in town. Man, those pancackes
          and biscuits are fantastic!"</i></p>
      </div>
    </div>
  </li>
  <li class="span4">
    <div class="thumbnail">
      <img src="/img/band.jpg" class="spinto-editable" id="band-image" />
      <div class="caption spinto-editable" id="middle-column">
        <h3>Restauration de tableaux</h3>
        <p>Critic Jim Jimmy says: <i>"On Tuesdays there is only
          one spot to visit for the best open mic in town. The
          stage at this bar is my secret for finding great bands
          and new music."</i></p>
      </div>
    </div>
  </li>
  <li class="span4">
    <div class="thumbnail">
      <img src="/img/fun.jpg" class="spinto-editable" id="fun-image" />
      <div class="caption spinto-editable" id="right-column">
        <h3>Canage de chaise</h3>
        <p>Regular Sam Simmons says: <i>"This is more than a
          cafe to me; Owners Nick and Sarah are just plain
          good people. You can't help but crack a smile when
          you walk in the door."</i></p>
      </div>
    </div>
  </li>
</ul>
</div>



/*
*
*  Function to run readmore.js for .expert-topic-filters div on the all-experts.php page
*
*/

jQuery(document).ready(function() { 
    jQuery('div.expert-topic-filters').readmore({
      speed: 500, //how fast it expands
      moreLink: '<a href="#" class="btn btn-default btn-sm center-block" title="View more expert areas" alt="View more expert areas"><span class="glyphicon glyphicon-chevron-down"></span></a>', //make the link a button
      lessLink: '<a href="#" class="btn btn-default btn-sm center-block" title="View fewer expert areas" alt="View fewer expert areas"><span class="glyphicon glyphicon-chevron-up"></span></a>', //make the link a button
      embedCSS: false, //don't use css from here; use the css in the style.css file
      collapsedHeight: 110 //max-height of the div before it's truncated
    })
  })

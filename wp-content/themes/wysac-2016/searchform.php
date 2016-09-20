<?php /*
*
* Default Search form
*
*/

?>

<form role="search" method="get" id="searchform" class="form-inline" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" class="form-control"/>
        <input type="submit" id="searchsubmit" value="Search" class="btn btn-default" />
    </div>
</form>

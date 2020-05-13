<form action="/" method="get" class="searchform">
    <label for="search"><h2>Search</h2></label>
    <div class="search-container">
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <button type="submit" alt="Search"><i class="fas fa-search"></i></button>
</div>
</form>
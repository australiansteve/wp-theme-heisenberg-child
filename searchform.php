<form action="/" method="get" class="searchform">
    
    <div class="search-container">
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search on site" />
    <input type="hidden" name="scrollto" id="" value="section_2" />
    <button type="submit" alt="Search"><i class="fas fa-search"></i></button>
</div>
</form>
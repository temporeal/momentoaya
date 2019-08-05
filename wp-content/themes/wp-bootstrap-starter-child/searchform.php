<form role="search" method="get" class="search-form" action="/">
    <label>
        <input type="search" class="search-field form-control" placeholder="O que você procura?" value="<?php the_search_query(); ?>" name="s" title="Buscar por:">
    </label>
    <input type="submit" class="search-submit btn btn-primary" value="Buscar">
</form>
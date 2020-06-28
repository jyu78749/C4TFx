<?php

require('../include/mellivora.inc.php');

login_session_refresh();

send_cache_headers('home', Config::get('MELLIVORA_CONFIG_CACHE_TIME_HOME'));

head(lang_get('home'));

if (cache_start(CONST_CACHE_NAME_HOME, Config::get('MELLIVORA_CONFIG_CACHE_TIME_HOME'))) {

    echo '<div id="home-logo"></div>
        <div class="home-intro-text">
        Welcome to CCCCTF (aka C4TF) 2020! Add more text
    </div>';

    echo '<div class="row">
    <div class="col-md-6">';

    //echo '<iframe src="https://discordapp.com/widget?id=519974854485737483&theme=dark" width="100%" height="240" allowtransparency="true" frameborder="0"></iframe>';

    section_head ("Rules");
    
    echo '<ul>
        <li>You can add rules here</li>
        <li>This would be a second rule</li>
        <li>Third rule</li>
        </ul>';

    echo '</div>
    <div class="col-md-6">';

    //section_head ("Latest News");

    //$news = db_query_fetch_all('SELECT * FROM news ORDER BY added DESC');

    //if (count ($news) == 0) {
    //	message_inline ("No news");
    //}

/*     foreach ($news as $item) {
        echo '<div class="ctfx-card">
            <div class="ctfx-card-head"><h4>',
                htmlspecialchars($item['title']),
                '</h4> <small>',
                date_time ($item['added']),
                '</small></div>
            <div class="ctfx-card-body">
                ',get_bbcode()->parse($item['body']),'
            </div>
        </div>'; */
    }

    echo '</div></div>';
    cache_end (CONST_CACHE_NAME_HOME);
}

foot();

<?php


    function posts_summary($attrs, $content = null) {
        $wp_post_date = get_the_date('Y-m-d');
        $sql = "select DATE_FORMAT(post_date, '%Y-%m-%d') as post_date, p.ID as post_id, p.post_title, p.post_excerpt, u.display_name, group_concat(t.term_id) from wp_posts p, wp_users u, wp_terms t, wp_term_taxonomy tt, wp_term_relationships tr where p.post_author = u.ID and p.post_status = 'publish' and t.term_id = tt.term_id and tt.term_taxonomy_id = tr.term_taxonomy_id and tt.taxonomy = 'category' and tr.object_id = p.ID and p.post_type='post' and DATE_FORMAT(post_date, '%Y-%m-%d') <= '$wp_post_date' and post_date >= DATE_SUB('$wp_post_date', INTERVAL 7 DAY) group by post_date, p.post_title order by post_date DESC";
        global $wpdb;
        $posts = $wpdb->get_results($sql);

        $posts_by_date = array();
        foreach ($posts as $p) {
            if (!array_key_exists ($p->post_date, $posts_by_date)) {
                $posts_by_date[$p->post_date] = array();
            }
            array_push($posts_by_date[$p->post_date], $p);
        }
        krsort($posts_by_date);
        $output = "";
        $output .= "<ul>";
        foreach ($posts_by_date as $key => $value) {
           $date = new DateTime($key);
           $date = $date->format("l, F j");
           $output .= "<li><a href=\"#$key\">$date</a></li>";
        }
        $output .= "</ul>";
        foreach ($posts_by_date as $key => $value) {
            $date = new DateTime($key);
            $date = $date->format("l, F j, o");
            $output .= "<div class=\"panel panel-default\"><a name=\"$key\"></a><div class=\"panel-heading\"><strong>$date</strong></div><div class=\"panel-body\">";
            $index = 0;
            foreach ($value as $p) {
                $index++;
                $output .= "<strong><a onclick=\"ga('send', 'event', 'Weekly Summary Click', this.innerHTML, this.getAttribute('href')); return true;\" href=\"" . get_permalink($p->post_id) . "\">$p->post_title</a></strong>";
                $output .= "<br/><small>By $p->display_name</small>";
                $output .= "<p>$p->post_excerpt</p>";
                if ($index != count($value)) $output .= "<hr/>";
            }
            $output .= "</div></div>";
        }
        return $output;

    }
    function aside_shortcode_handler( $attrs, $content = null ) {
       $str = '<div class="aside">';
       if (array_key_exists('header', $attrs)) {
           $str.= '<div class="aside-header">' . $attrs['header'] . '</div>';
       }
       $str .= '<div class="aside-content">' . $content . '</div>';
       if (array_key_exists('footer', $attrs)) {
           $str.= '<div class="aside-footer">' . $attrs['footer'] . '</div>';
       }
       $str .= '</div>';
       return $str;
    }

    function gfy_shortcode_handler( $attrs, $content = null ) {

       return '<div class="gfyitem" data-title=true data-autoplay=false data-controls=true data-expand=true  data-id="' . $content .'" ></div>';
    }
    add_shortcode( 'aside', 'aside_shortcode_handler' );
    add_shortcode( 'gfy', 'gfy_shortcode_handler' );

?>

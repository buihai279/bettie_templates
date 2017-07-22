<?php 
function get_the_category_list_rewrite( $separator = '', $parents='', $post_id = false ) {
    global $wp_rewrite;
    if ( ! is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) ) {
        return apply_filters( 'the_category', '', $separator, $parents );
    }
    $categories = apply_filters( 'the_category_list', get_the_category( $post_id ), $post_id );
    if ( empty( $categories ) ) {
        return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );
    }
    $rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';
    $thelist = '';
    if ( '' == $separator ) {
        $thelist .= '<ul class="post-categories">';
        $k=0;
        foreach ( $categories as $category ) {
            if ($k>2)
                break;
            else $k++;
            $thelist .= "\n\t<li>";
            switch ( strtolower( $parents ) ) {
                case 'multiple':
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, true, $separator );
                    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
                    break;
                case 'single':
                    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '"  ' . $rel . '>';
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, false, $separator );
                    $thelist .= $category->name.'</a></li>';
                    break;
                case '':
                default:
                    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
            }
        }
        $thelist .= '</ul>';
    } else {
        $i = 0;
        foreach ( $categories as $category ) {
            if ( 0 < $i )
                $thelist .= $separator;
            switch ( strtolower( $parents ) ) {
                case 'multiple':
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, true, $separator );
                    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a>';
                    break;
                case 'single':
                    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>';
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, false, $separator );
                    $thelist .= "$category->name</a>";
                    break;
                case '':
                default:
                    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a>';
            }
            ++$i;
        }
    }
    return apply_filters( 'the_category', $thelist, $separator, $parents );
}
 ?>
<?php
function get_dynamic_subpage_title() {
    global $wpdb, $wp;

    // Obtener la URL actual
    $current_url = home_url(add_query_arg(array(), $wp->request));
    
    // Extraer el slug actual de la URL
    $path = parse_url($current_url, PHP_URL_PATH);
    $slug = basename($path);
    
    // Nombre de la opción que contiene los datos de las sub-páginas
    $option_name = 'profile-builder'; // Asegúrate de que este es el nombre exacto de la opción

    // Obtener la opción que contiene los datos de las sub-páginas
    $option_value = get_option($option_name);

    if ($option_value) {
        // Deserializar la opción
        $data = maybe_unserialize($option_value);
        
        // Verificar si la estructura de datos contiene las sub-páginas
        if (isset($data['account_page_structure'])) {
            foreach ($data['account_page_structure'] as $subpage) {
                if (isset($subpage['slug']) && $subpage['slug'] === $slug) {
                    return $subpage['title'];
                }
            }
        }
    }
    
    return 'Título no encontrado'; // Título por defecto si no se encuentra el slug
}
add_shortcode('dynamic_subpage_title', 'get_dynamic_subpage_title');

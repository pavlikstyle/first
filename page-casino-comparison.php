<?php
/**
 * Template Name: Casino Comparison
 * Template Post Type: page, post
 *
 * Long-form casino comparison with detailed reviews and comparison table
 *
 * @package ApuestaExperto
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('comparison-article'); ?>>

    <!-- Breadcrumbs -->
    <div class="container">
        <?php ae_breadcrumbs(); ?>
    </div>

    <!-- Article Header -->
    <header class="article-header section-sm bg-light">
        <div class="container-narrow">
            <div class="article-meta-top flex gap-sm text-muted mb-2">
                <span class="article-category badge badge-primary">Comparativa</span>
                <span class="article-date">
                    Actualizado: <?php echo get_the_modified_date('j \d\e F, Y'); ?>
                </span>
            </div>

            <h1 class="article-title">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_title();
                    endwhile;
                endif;
                ?>
            </h1>

            <!-- Author & Meta Info -->
            <div class="article-meta-bar flex-between mt-3">
                <div class="author-info flex gap-sm">
                    <div class="author-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/author/tancredo-franco-aguirre.jpg"
                             alt="Tancredo Franco Aguirre"
                             width="48"
                             height="48"
                             class="img-circle"
                             loading="eager">
                    </div>
                    <div class="author-details">
                        <div class="author-name">
                            <strong>Por Tancredo Franco Aguirre</strong>
                        </div>
                        <div class="author-credentials text-muted">
                            <small>Experto en iGaming | 8+ años de experiencia</small>
                        </div>
                    </div>
                </div>
                <div class="reading-time hide-mobile">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.2 3.2.8-1.3-4.5-2.7V7z"/>
                    </svg>
                    <?php ae_display_reading_time(); ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Introduction -->
    <section class="article-intro section-sm">
        <div class="container-narrow">
            <div class="intro-content">
                <p class="lead">
                    <?php _e('Bienvenido a la guía más completa de casinos online en Colombia para 2026. Hemos evaluado decenas de plataformas basándonos en seguridad, variedad de juegos, bonos, métodos de pago y soporte al cliente para traerte solo las mejores opciones.', 'apuestaexperto'); ?>
                </p>
                <p>
                    <?php _e('Todos los casinos recomendados cumplen con estrictos criterios de seguridad, ofrecen licencias verificables y proporcionan experiencias de juego justas y transparentes. Ya sea que busques slots, casino en vivo, o apuestas con criptomonedas, encontrarás la plataforma perfecta aquí.', 'apuestaexperto'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Quick List - Top Casinos Summary -->
    <section class="quick-list-section section bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-4">
                <?php _e('🎰 Top 5 Mejores Casinos Online Colombia 2026 - Vista Rápida', 'apuestaexperto'); ?>
            </h2>

            <div class="quick-casino-list">
                <?php
                // Quick list data
                $quick_casinos = array(
                    array(
                        'slug' => 'bcgame',
                        'position' => 1,
                        'rating' => 4.8,
                        'bonus' => '300% hasta $20,000 + 100 Giros Gratis',
                        'highlights' => array(
                            'Más de 8,000 juegos',
                            'Retiros en criptomonedas instantáneos',
                            'VIP cashback hasta 20%'
                        )
                    ),
                    array(
                        'slug' => 'caliente',
                        'position' => 2,
                        'rating' => 4.7,
                        'bonus' => 'Bono de Bienvenida hasta $5,000',
                        'highlights' => array(
                            'Licencia Coljuegos oficial',
                            'Soporte en español 24/7',
                            'Pagos en pesos colombianos'
                        )
                    ),
                    array(
                        'slug' => 'winz',
                        'position' => 3,
                        'rating' => 4.6,
                        'bonus' => '200% hasta €1,000 + 50 Free Spins',
                        'highlights' => array(
                            'Sin KYC para cripto',
                            'Bonos sin requisitos de apuesta',
                            'Slots de proveedores premium'
                        )
                    ),
                    array(
                        'slug' => 'instantcasino',
                        'position' => 4,
                        'rating' => 4.5,
                        'bonus' => '100% hasta €500 + 200 FS',
                        'highlights' => array(
                            'Registro instantáneo',
                            'Live casino con dealers en español',
                            'Jackpots progresivos'
                        )
                    ),
                    array(
                        'slug' => 'thrill',
                        'position' => 5,
                        'rating' => 4.5,
                        'bonus' => 'Paquete de Bienvenida hasta €1,500',
                        'highlights' => array(
                            'Torneos de slots semanales',
                            'Métodos de pago variados',
                            'App móvil nativa'
                        )
                    )
                );

                foreach ($quick_casinos as $casino) :
                    $provider_name = ae_get_provider_name($casino['slug']);
                ?>
                    <div class="quick-casino-item card flex-between">
                        <div class="quick-casino-info flex gap-md">
                            <div class="casino-rank">
                                <span class="rank-badge">#<?php echo $casino['position']; ?></span>
                            </div>
                            <div class="casino-details">
                                <h3 class="casino-name"><?php echo esc_html($provider_name); ?></h3>
                                <div class="casino-rating mb-1">
                                    <?php echo ae_star_rating($casino['rating']); ?>
                                </div>
                                <div class="casino-bonus text-primary mb-1">
                                    <strong><?php echo esc_html($casino['bonus']); ?></strong>
                                </div>
                                <ul class="casino-highlights">
                                    <?php foreach ($casino['highlights'] as $highlight) : ?>
                                        <li><span class="check-icon">✓</span> <?php echo esc_html($highlight); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="quick-casino-cta">
                            <?php ae_affiliate_button($casino['slug'], 'casino', __('Jugar Ahora', 'apuestaexperto'), 'btn-primary'); ?>
                            <a href="#review-<?php echo $casino['slug']; ?>" class="btn btn-outline btn-sm mt-1">
                                <?php _e('Ver Reseña', 'apuestaexperto'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Detailed Reviews Section -->
    <section class="detailed-reviews-section section">
        <div class="container-narrow">
            <h2 class="section-title text-center mb-4">
                <?php _e('📋 Reseñas Detalladas - Análisis Completo de Cada Casino', 'apuestaexperto'); ?>
            </h2>

            <?php
            // Detailed reviews
            $detailed_reviews = array(
                array(
                    'slug' => 'bcgame',
                    'position' => 1,
                    'subtitle' => 'El Mejor Casino de Criptomonedas',
                    'description' => 'BC.Game lidera nuestra lista como el casino de criptomonedas más completo del mercado. Con más de 8,000 juegos, retiros instantáneos en cripto y un programa VIP excepcional, es la opción perfecta para jugadores que valoran la privacidad y la velocidad. La plataforma destaca por su interfaz intuitiva, bonos generosos sin rollover excesivo, y una selección impresionante de juegos exclusivos.',
                    'pros' => array(
                        'Retiros instantáneos en Bitcoin, Ethereum y 100+ criptomonedas',
                        'Sin KYC para transacciones cripto',
                        'Bonos con wagering justo (35x)',
                        'Más de 8,000 juegos de 70+ proveedores',
                        'Programa VIP con cashback hasta 20%',
                        'Casino en vivo premium con Evolution Gaming'
                    ),
                    'cons' => array(
                        'No acepta pesos colombianos directamente',
                        'Opciones limitadas para jugadores sin cripto'
                    ),
                    'rating' => 4.8,
                    'games' => '8,000+',
                    'license' => 'Curaçao eGaming',
                    'min_deposit' => '$10 (BTC)',
                    'withdrawal_time' => 'Instantáneo (cripto)'
                ),
                array(
                    'slug' => 'caliente',
                    'position' => 2,
                    'subtitle' => 'Casino con Licencia Coljuegos - Totalmente Legal en Colombia',
                    'description' => 'Caliente es la opción número uno para jugadores colombianos que buscan tranquilidad legal. Con licencia oficial de Coljuegos, ofrece una plataforma completamente regulada con soporte en español, pagos en pesos colombianos y cumplimiento total con las normativas locales. Su catálogo de slots de proveedores top y casino en vivo con dealers hispanohablantes lo convierten en una opción confiable y profesional.',
                    'pros' => array(
                        'Licencia Coljuegos oficial - 100% legal',
                        'Soporte al cliente en español 24/7',
                        'Depósitos y retiros en pesos colombianos',
                        'Métodos de pago locales (PSE, Efecty, etc.)',
                        'Slots de NetEnt, Pragmatic Play, Playtech',
                        'Programa de lealtad con puntos canjeables'
                    ),
                    'cons' => array(
                        'Bonos con requisitos de apuesta más altos (40x)',
                        'Proceso KYC obligatorio'
                    ),
                    'rating' => 4.7,
                    'games' => '1,500+',
                    'license' => 'Coljuegos',
                    'min_deposit' => '$20,000 COP',
                    'withdrawal_time' => '24-48 horas'
                ),
                array(
                    'slug' => 'winz',
                    'position' => 3,
                    'subtitle' => 'Bonos Sin Wagering - Sin Requisitos de Apuesta',
                    'description' => 'Winz.io revoluciona la industria con su innovador sistema de bonos sin requisitos de apuesta. Lo que ganas es tuyo inmediatamente, sin complicadas condiciones. Acepta criptomonedas sin KYC, ofrece retiros ultrarrápidos y una selección curada de slots de alta calidad. Ideal para jugadores experimentados que valoran la transparencia y la simplicidad.',
                    'pros' => array(
                        'Bonos completamente sin wagering',
                        'Sin KYC para criptomonedas',
                        'Retiros procesados en minutos',
                        'Cashback diario del 10%',
                        'Slots con RTP alto (97%+)',
                        'Torneo de slots con premios garantizados'
                    ),
                    'cons' => array(
                        'Catálogo de juegos más limitado (3,000)',
                        'No disponible en monedas fiat'
                    ),
                    'rating' => 4.6,
                    'games' => '3,000+',
                    'license' => 'Curaçao',
                    'min_deposit' => '0.0001 BTC',
                    'withdrawal_time' => '5-15 minutos'
                ),
                array(
                    'slug' => 'instantcasino',
                    'position' => 4,
                    'subtitle' => 'Registro Instantáneo - Juega en Segundos',
                    'description' => 'Instant Casino ofrece la experiencia de registro más rápida del mercado. Sin formularios largos, sin verificación previa - deposita y juega en menos de 30 segundos. Su casino en vivo con Evolution Gaming y Pragmatic Play Live cuenta con dealers que hablan español, creando una experiencia auténtica. Los jackpots progresivos frecuentemente superan el millón de dólares.',
                    'pros' => array(
                        'Registro en menos de 30 segundos',
                        'Casino en vivo con dealers en español',
                        'Jackpots progresivos millonarios',
                        'App móvil optimizada para iOS y Android',
                        'Métodos de pago instantáneos',
                        'Soporte vía chat en vivo 24/7'
                    ),
                    'cons' => array(
                        'Límites de retiro semanales ($5,000)',
                        'Bonos con wagering estándar (40x)'
                    ),
                    'rating' => 4.5,
                    'games' => '2,500+',
                    'license' => 'Malta Gaming Authority',
                    'min_deposit' => '€10',
                    'withdrawal_time' => '12-24 horas'
                ),
                array(
                    'slug' => 'thrill',
                    'position' => 5,
                    'subtitle' => 'Torneos y Competencias - Para Jugadores Competitivos',
                    'description' => 'Thrill se especializa en crear experiencias competitivas con torneos semanales de slots, tablas de clasificación y premios garantizados. Su app móvil nativa es considerada una de las mejores del sector, con notificaciones push para torneos y promociones exclusivas. El programa VIP tiene niveles alcanzables con beneficios reales desde el primer día.',
                    'pros' => array(
                        'Torneos de slots semanales con €10,000 garantizados',
                        'App móvil nativa premiada',
                        'Múltiples métodos de pago (tarjetas, e-wallets, cripto)',
                        'Programa VIP con 8 niveles',
                        'Giros gratis diarios para miembros',
                        'Soporte multilingüe incluido español'
                    ),
                    'cons' => array(
                        'Catálogo de juegos estándar',
                        'Proceso de verificación puede tardar 48h'
                    ),
                    'rating' => 4.5,
                    'games' => '2,200+',
                    'license' => 'Curaçao',
                    'min_deposit' => '€20',
                    'withdrawal_time' => '24-48 horas'
                )
            );

            foreach ($detailed_reviews as $review) :
                $provider_name = ae_get_provider_name($review['slug']);
            ?>
                <div id="review-<?php echo $review['slug']; ?>" class="detailed-review-item mb-4">
                    <div class="review-header">
                        <div class="review-number">
                            <span class="position-badge"><?php echo $review['position']; ?></span>
                        </div>
                        <div class="review-title-block">
                            <h3 class="review-title">
                                <?php echo esc_html($provider_name); ?> – <?php echo esc_html($review['subtitle']); ?>
                            </h3>
                            <div class="review-rating-bar flex gap-md mt-1">
                                <?php echo ae_star_rating($review['rating']); ?>
                                <span class="review-stats text-muted">
                                    <strong><?php echo esc_html($review['games']); ?></strong> juegos |
                                    Licencia: <?php echo esc_html($review['license']); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="review-content card mt-2">
                        <!-- Provider Logo -->
                        <div class="provider-logo-large mb-3" style="text-align: center;">
                            <?php
                            $logo_filename = ae_get_provider_logo($review['slug']);
                            $logo_path = get_template_directory_uri() . '/assets/images/providers/' . $logo_filename;
                            ?>
                            <img src="<?php echo esc_url($logo_path); ?>"
                                 alt="<?php echo esc_attr($provider_name . ' Logo'); ?>"
                                 style="max-width: 200px; height: auto; display: inline-block;"
                                 loading="lazy">
                        </div>

                        <div class="review-description mb-3">
                            <p><?php echo esc_html($review['description']); ?></p>
                        </div>

                        <div class="pros-cons-grid grid grid-2 mb-3">
                            <!-- Pros -->
                            <div class="pros-section">
                                <h4 class="pros-title text-success">✓ Ventajas</h4>
                                <ul class="pros-list">
                                    <?php foreach ($review['pros'] as $pro) : ?>
                                        <li><?php echo esc_html($pro); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Cons -->
                            <div class="cons-section">
                                <h4 class="cons-title text-danger">✗ Desventajas</h4>
                                <ul class="cons-list">
                                    <?php foreach ($review['cons'] as $con) : ?>
                                        <li><?php echo esc_html($con); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="review-quick-stats grid grid-4 bg-light p-2 mb-3" style="border-radius: 8px;">
                            <div class="stat-item text-center">
                                <div class="stat-label text-muted"><small>Depósito Mínimo</small></div>
                                <div class="stat-value"><strong><?php echo esc_html($review['min_deposit']); ?></strong></div>
                            </div>
                            <div class="stat-item text-center">
                                <div class="stat-label text-muted"><small>Tiempo Retiro</small></div>
                                <div class="stat-value"><strong><?php echo esc_html($review['withdrawal_time']); ?></strong></div>
                            </div>
                            <div class="stat-item text-center">
                                <div class="stat-label text-muted"><small>Juegos</small></div>
                                <div class="stat-value"><strong><?php echo esc_html($review['games']); ?></strong></div>
                            </div>
                            <div class="stat-item text-center">
                                <div class="stat-label text-muted"><small>Licencia</small></div>
                                <div class="stat-value"><strong><?php echo esc_html($review['license']); ?></strong></div>
                            </div>
                        </div>

                        <!-- CTA -->
                        <div class="review-cta text-center">
                            <?php ae_affiliate_button($review['slug'], 'casino', sprintf(__('Visitar %s →', 'apuestaexperto'), $provider_name), 'btn-primary btn-lg'); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Comparison Table -->
    <section class="comparison-table-section section bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-4">
                <?php _e('📊 Tabla Comparativa - Casinos Online Colombia 2026', 'apuestaexperto'); ?>
            </h2>

            <div class="table-responsive">
                <?php
                $comparison_data = array(
                    array(
                        'slug' => 'bcgame',
                        'rating' => '4.8/5',
                        'cryptos' => 'BTC, ETH, LTC, USDT, +100 más',
                        'min_deposit' => '$10',
                        'games' => 'Slots, Live, Originals, Sports',
                        'license' => 'Curaçao',
                        'withdrawal' => 'Instantáneo'
                    ),
                    array(
                        'slug' => 'caliente',
                        'rating' => '4.7/5',
                        'cryptos' => 'No acepta cripto',
                        'min_deposit' => '$20,000 COP',
                        'games' => 'Slots, Live, Ruleta, Blackjack',
                        'license' => 'Coljuegos',
                        'withdrawal' => '24-48h'
                    ),
                    array(
                        'slug' => 'winz',
                        'rating' => '4.6/5',
                        'cryptos' => 'BTC, ETH, USDT, BNB',
                        'min_deposit' => '0.0001 BTC',
                        'games' => 'Slots, Live, Jackpots',
                        'license' => 'Curaçao',
                        'withdrawal' => '5-15 min'
                    ),
                    array(
                        'slug' => 'instantcasino',
                        'rating' => '4.5/5',
                        'cryptos' => 'BTC, ETH, LTC',
                        'min_deposit' => '€10',
                        'games' => 'Slots, Live, Jackpots, Table',
                        'license' => 'MGA',
                        'withdrawal' => '12-24h'
                    ),
                    array(
                        'slug' => 'thrill',
                        'rating' => '4.5/5',
                        'cryptos' => 'BTC, ETH, USDT',
                        'min_deposit' => '€20',
                        'games' => 'Slots, Live, Poker, Table',
                        'license' => 'Curaçao',
                        'withdrawal' => '24-48h'
                    )
                );

                echo '<table class="comparison-table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Casino</th>';
                echo '<th>Calificación</th>';
                echo '<th>Criptomonedas</th>';
                echo '<th>Depósito Mín.</th>';
                echo '<th>Juegos Principales</th>';
                echo '<th>Licencia</th>';
                echo '<th>Tiempo Retiro</th>';
                echo '<th>Acción</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($comparison_data as $casino) {
                    $provider_name = ae_get_provider_name($casino['slug']);
                    echo '<tr>';
                    echo '<td><strong>' . esc_html($provider_name) . '</strong></td>';
                    echo '<td>' . esc_html($casino['rating']) . '</td>';
                    echo '<td>' . esc_html($casino['cryptos']) . '</td>';
                    echo '<td>' . esc_html($casino['min_deposit']) . '</td>';
                    echo '<td>' . esc_html($casino['games']) . '</td>';
                    echo '<td>' . esc_html($casino['license']) . '</td>';
                    echo '<td>' . esc_html($casino['withdrawal']) . '</td>';
                    echo '<td>';
                    ae_affiliate_button($casino['slug'], 'casino', 'Jugar', 'btn-primary btn-sm');
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                ?>
            </div>

            <p class="table-note text-center text-muted mt-3">
                <small><?php _e('* Última actualización: ', 'apuestaexperto'); ?><?php echo date('F Y'); ?>. <?php _e('Los datos pueden variar según promociones vigentes.', 'apuestaexperto'); ?></small>
            </p>
        </div>
    </section>

    <!-- Why Choose Online Casino -->
    <section class="why-choose-section section">
        <div class="container-narrow">
            <h2 class="section-title mb-3">
                <?php _e('¿Por Qué Elegir un Casino Online en Colombia?', 'apuestaexperto'); ?>
            </h2>

            <div class="why-content">
                <p><?php _e('Los casinos online ofrecen ventajas significativas sobre los casinos físicos tradicionales:', 'apuestaexperto'); ?></p>

                <ul class="benefits-list">
                    <li><strong><?php _e('Acceso 24/7:', 'apuestaexperto'); ?></strong> <?php _e('Juega cuando quieras, desde donde quieras, sin restricciones de horario.', 'apuestaexperto'); ?></li>
                    <li><strong><?php _e('Bonos Generosos:', 'apuestaexperto'); ?></strong> <?php _e('Los casinos online compiten por tu atención con bonos de bienvenida, cashback y programas VIP.', 'apuestaexperto'); ?></li>
                    <li><strong><?php _e('Mayor Variedad:', 'apuestaexperto'); ?></strong> <?php _e('Miles de slots, decenas de mesas de casino en vivo, y juegos exclusivos que no encontrarás en casinos físicos.', 'apuestaexperto'); ?></li>
                    <li><strong><?php _e('Pagos Rápidos:', 'apuestaexperto'); ?></strong> <?php _e('Especialmente con criptomonedas, puedes recibir tus ganancias en minutos.', 'apuestaexperto'); ?></li>
                    <li><strong><?php _e('Juego Responsable:', 'apuestaexperto'); ?></strong> <?php _e('Herramientas de autoexclusión, límites de depósito y períodos de enfriamiento para proteger a los jugadores.', 'apuestaexperto'); ?></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- How to Choose -->
    <section class="how-to-choose-section section bg-light">
        <div class="container-narrow">
            <h2 class="section-title mb-3">
                <?php _e('Cómo Elegir el Mejor Casino Online - Criterios de Evaluación', 'apuestaexperto'); ?>
            </h2>

            <div class="criteria-content">
                <p><?php _e('Al evaluar cada casino, aplicamos una metodología rigurosa basada en estos pilares fundamentales:', 'apuestaexperto'); ?></p>

                <div class="criteria-list mt-3">
                    <div class="criterion-item mb-3">
                        <h4>🔒 1. Seguridad y Licencias</h4>
                        <p><?php _e('Verificamos que cada casino posea licencias válidas (Coljuegos, Curaçao, MGA), utilice encriptación SSL, y tenga políticas claras de protección de datos.', 'apuestaexperto'); ?></p>
                    </div>

                    <div class="criterion-item mb-3">
                        <h4>🎮 2. Calidad y Variedad de Juegos</h4>
                        <p><?php _e('Evaluamos el catálogo completo: cantidad de slots, presencia de proveedores premium (NetEnt, Pragmatic Play, Evolution Gaming), y opciones de casino en vivo.', 'apuestaexperto'); ?></p>
                    </div>

                    <div class="criterion-item mb-3">
                        <h4>💰 3. Bonos y Promociones</h4>
                        <p><?php _e('Analizamos los términos reales: requisitos de apuesta (wagering), juegos elegibles, tiempo de validez, y valor real del bono.', 'apuestaexperto'); ?></p>
                    </div>

                    <div class="criterion-item mb-3">
                        <h4>💳 4. Métodos de Pago</h4>
                        <p><?php _e('Probamos depósitos y retiros con diversos métodos: criptomonedas, tarjetas, e-wallets, y transferencias bancarias locales.', 'apuestaexperto'); ?></p>
                    </div>

                    <div class="criterion-item mb-3">
                        <h4>⚡ 5. Velocidad de Retiro</h4>
                        <p><?php _e('Medimos el tiempo real desde la solicitud hasta la recepción de fondos, considerando diferentes métodos de pago.', 'apuestaexperto'); ?></p>
                    </div>

                    <div class="criterion-item mb-3">
                        <h4>🎧 6. Soporte al Cliente</h4>
                        <p><?php _e('Evaluamos disponibilidad (24/7), idiomas (español), canales (chat, email, teléfono), y tiempos de respuesta.', 'apuestaexperto'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Author Bio Box -->
    <section class="author-bio-section section">
        <div class="container-narrow">
            <div class="author-bio-box card">
                <div class="author-bio-header flex gap-md mb-2">
                    <div class="author-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/author/tancredo-franco-aguirre.jpg"
                             alt="Tancredo Franco Aguirre"
                             width="100"
                             height="100"
                             class="img-circle"
                             loading="lazy">
                    </div>
                    <div class="author-info-detailed">
                        <h3 class="author-name-large">Tancredo Franco Aguirre</h3>
                        <p class="author-title text-primary"><strong>Experto en iGaming y Analista de Casinos Online</strong></p>
                        <div class="author-credentials text-muted">
                            <small>8+ años de experiencia | Certificado en Juego Responsable | Ex-consultor de regulación Coljuegos</small>
                        </div>
                    </div>
                </div>
                <div class="author-bio-content">
                    <p>
                        <?php _e('Tancredo Franco Aguirre es un reconocido experto en la industria del iGaming con más de 8 años de experiencia evaluando casinos online y casas de apuestas. Graduado en Administración de Empresas con especialización en Tecnologías de Información, ha trabajado directamente con operadores internacionales y reguladores locales, incluyendo una colaboración como consultor externo para Coljuegos en temas de cumplimiento normativo.', 'apuestaexperto'); ?>
                    </p>
                    <p>
                        <?php _e('Su metodología de análisis combina pruebas prácticas rigurosas con conocimiento técnico profundo sobre RTP, volatilidad, y algoritmos de RNG. Ha revisado más de 200 plataformas de juego y es una voz respetada en la comunidad hispanohablante de iGaming. Tancredo también es certificado en Juego Responsable y aboga activamente por prácticas de gambling ético y transparente.', 'apuestaexperto'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="disclaimer-section section bg-light">
        <div class="container-narrow">
            <div class="disclaimer-box p-3" style="border-left: 4px solid var(--warning-color);">
                <h4><?php _e('⚠️ Aviso Legal y Juego Responsable', 'apuestaexperto'); ?></h4>
                <p>
                    <?php _e('El juego en línea debe ser una forma de entretenimiento, no una fuente de ingresos. Solo debes jugar con dinero que puedas permitirte perder. Si sientes que el juego está afectando negativamente tu vida, busca ayuda profesional.', 'apuestaexperto'); ?>
                </p>
                <ul class="disclaimer-list">
                    <li><?php _e('Solo para mayores de 18 años en Colombia.', 'apuestaexperto'); ?></li>
                    <li><?php _e('Verifica la legalidad del juego online en tu jurisdicción específica.', 'apuestaexperto'); ?></li>
                    <li><?php _e('Los casinos recomendados son seleccionados de forma independiente, pero podemos recibir comisiones por referidos.', 'apuestaexperto'); ?></li>
                    <li><?php _e('Revisa siempre los términos y condiciones de cada casino antes de registrarte.', 'apuestaexperto'); ?></li>
                </ul>
                <p class="mt-2">
                    <strong><?php _e('Recursos de ayuda:', 'apuestaexperto'); ?></strong>
                    <a href="https://www.jugarbien.es/" target="_blank" rel="noopener">JugarBien.es</a> |
                    <a href="https://www.gamblingtherapy.org/es" target="_blank" rel="noopener">Gambling Therapy</a>
                </p>
            </div>
        </div>
    </section>

</article>

<?php
// Output Schema markup for this comparison page
$schema_data = array(
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => get_the_title(),
    'description' => 'Guía completa de los mejores casinos online en Colombia 2026. Reseñas detalladas, comparativas y análisis experto.',
    'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
    'datePublished' => get_the_date('c'),
    'dateModified' => get_the_modified_date('c'),
    'author' => array(
        '@type' => 'Person',
        'name' => 'Tancredo Franco Aguirre',
        'jobTitle' => 'Experto en iGaming',
        'description' => 'Experto en iGaming con 8+ años de experiencia evaluando casinos online'
    ),
    'publisher' => array(
        '@type' => 'Organization',
        'name' => get_bloginfo('name'),
        'logo' => array(
            '@type' => 'ImageObject',
            'url' => get_template_directory_uri() . '/assets/images/logo.png'
        )
    )
);

echo '<script type="application/ld+json">';
echo wp_json_encode($schema_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
echo '</script>';
?>

<?php get_footer(); ?>

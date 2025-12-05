<?php get_header(); ?>
 <!-- main -->
     <main>
        <?php
        // URL = mainvisual
        $mainvisual = get_page_by_path('mainvisual');

        if($mainvisual) {
            $mainvisual_id = $mainvisual->ID;
            $mainvisual_eyebrow =  get_post_meta($mainvisual_id, 'eyebrow', true);
            $mainvisual_title = get_post_meta($mainvisual_id, 'title', true);
            $mainvisual_lead = get_post_meta($mainvisual_id, 'lead', true);
        }
        ?>
        <section class="hero" id="hero">
            <div class="hero-content">
                <p class="hero-eyebrow">
                    <?php echo esc_html($mainvisual_eyebrow); ?>
                </p>
                <h1>
                    <?php echo esc_html($mainvisual_title); ?>
                    
                </h1>
                <p class="hero-lead">
                    <?php echo esc_html($mainvisual_lead); ?>
                </p>
                <a href="#reservation" class="btn btn--primary">
                    宿泊プランを見る
                </a>
            </div>
        </section>

        <section id="reservation" class="reservation">
            <h2 class="section-title">
                宿泊予約
            </h2>
            <form class="reservation-form" action="" method="post">
                <label class="reservation-field">
                    <span>チェックイン</span>
                    <input type="date" name="checkin" required>
                </label>
                <label class="reservation-field">
                    <span>チェックアウト</span>
                    <input type="date" name="checkout" required>
                </label>
                <label class="reservation-field">
                    <span>宿泊人数</span>
                    <select name="guests">
                        <option value="1">1名</option>
                        <option value="2" selected>2名</option>
                        <option value="3">3名</option>
                        <option value="4">4名</option>
                        <option value="5">5名</option>
                    </select>
                </label>
                <label class="reservation-field">
                    <span>客室タイプ</span>
                    <select name="room">
                        <option value="ocean">
                            オーシャンビュー
                        </option>
                        <option value="garden">
                            ガーデンビュー
                        </option>
                        <option value="suite">
                            スイート
                        </option>
                    </select>
                </label>
                <button class="btn btn--accent" type="submit">
                    空室状況を確認
                </button>
            </form>
        </section>

        <!-- news -->
         <section id="news" class="news">
            <div class="section-header">
                <h2 class="section-title">
                    ニュース
                </h2>
                <ul class="news-list">
                    <?php 
                    $news_query = new WP_Query(
                        array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                        )
                        );
                    ?>
                    <?php if ($news_query -> have_posts()) : ?>
                    <?php while ($news_query -> have_posts()) : $news_query -> the_post(); ?>
                    <li class="news-item">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php 
                            echo esc_html(get_the_date('Y.m.d'));
                            ?>
                        </time>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p class="news-empty">
                        News Not Found.
                    </p>
                <?php endif; ?>
                <?php
                $news_archive_link = get_permalink(get_option('page_for_posts'));
                if(!$news_archive_link) {
                    $news_archive_link = get_post_type_archive_link('post');
                }
                if($news_archive_link) :
                ?>
                <a href="" class="section-link">
                    All View
                </a>
                <?php endif; ?>
            </div>
         </section>

         <!-- concept -->
          <?php
          $concept = get_page_by_path('concept');

          if ($concept) {
            $concept_id = $concept->ID;
            $concept_title = get_post_meta($concept_id, 'title', true);
            $concept_catch = get_post_meta($concept_id, 'catch', true);
            $concept_text = get_post_meta($concept_id, 'text', true);
          }
          ?>

          <section id="concept" class="concept">
            <div class="concept-inner">
                <h2 class="section-title">
                    <?php echo esc_html($concept_title); ?>
                </h2>
                <p class="concept-catch">
                    <?php echo esc_html($concept_catch); ?>
                </p>
                <p class="concept-text">
                    <?php echo esc_html($concept_text); ?>
                </p>
            </div>
          </section>

          <!-- rooms -->
          <section id="rooms" class="rooms">
            <h2 class="section-title">
                客室のご案内
            </h2>

            <div class="card-grid">
                <article class="card">
                    <h3 class="card-title">
                        プレミアムオーシャンビュー
                    </h3>
                    <p class="card-subtitle">
                        定員4名
                    </p>
                    <p class="card-text">
                        バルコニーから海を一望
                    </p>
                    <a href="premium-ocean-view.html" class="card-link">
                        詳しく見る
                    </a>
                </article>
                <article class="card">
                    <h3 class="card-title">
                        クラブルーム
                    </h3>
                    <p class="card-subtitle">
                        定員3名
                    </p>
                    <p class="card-text">
                        ラウンジアクセス
                    </p>
                    <a href="club-room.html" class="card-link">
                        詳しく見る
                    </a>
                </article>
                <article class="card">
                    <h3 class="card-title">
                        スイート
                    </h3>
                    <p class="card-subtitle">
                        定員4名
                    </p>
                    <p class="card-text">
                        温泉付き
                    </p>
                    <a href="suite.html" class="card-link">
                        詳しく見る
                    </a>
                </article>
            </div>
          </section>

          <!-- restaurant -->
           <section id="restaurant" class="restaurant">
            <div class="restaurant-inner">
                <h2 class="section-title section-title--light">
                    レストラン&バー
                </h2>
                <p class="restaurant-lead">
                    沖縄の食材とフレンチのレストラン
                </p>
                <ul class="restaurant-list">
                    <li>
                        <span class="restaurant-name">
                            Lagoon Dining
                        </span>
                        <span class="restaurant-desc">
                            魚と野菜を使ったコース
                        </span>
                    </li>
                    <li>
                        <span class="restaurant-name">
                            ロビーラウンジ
                        </span>
                        <span class="restaurant-desc">
                            サンセットを眺めながら楽しむアフタヌーンティー
                        </span>
                    </li>
                    <li>
                        <span class="restaurant-name">
                            Bar Blue
                        </span>
                        <span class="restaurant-desc">
                            ナイトプールで味わうカクテル
                        </span>
                    </li>
                </ul>

                <a href="#" class="btn btn--outline">
                    詳しく見る
                </a>
            </div>
           </section>

           <?php
           $access = get_page_by_path('access');
           if($access) {
            $access_id = $access->ID;
            $access_address = get_post_meta($access_id, 'address', true);
            $access_note = get_post_meta($access_id, 'note', true);
            $access_tel = get_post_meta($access_id, 'tel', true);
            $access_email = get_post_meta($access_id, 'email', true);
            $access_parking = get_post_meta($access_id, 'parking', true);
            $access_map = get_post_meta($access_id, 'map', true);
           }
           ?>

           <section id="access" class="access">
            <h2 class="section-title">
                アクセス
            </h2>
            <div class="access-grid">
                <div class="access-info">
                    <p class="access-address">
                        <?php echo esc_html($access_address); ?>
                    </p>
                    <p>
                        <?php echo esc_html($access_note); ?>
                    </p>
                    <dl class="access-contact">
                        <div>
                            <dt>Tel</dt>
                            <dd><?php echo esc_html($access_tel); ?></dd>
                        </div>
                        <div>
                            <dt>Email</dt>
                            <dd><?php echo esc_html($access_email); ?></dd>
                        </div>
                        <div>
                            <dt>駐車場</dt>
                            <dd><?php echo esc_html($access_parking); ?></dd>
                        </div>
                    </dl>
                    <a href="#" class="section-link" target="_blank">
                        Google Map
                    </a>
                </div>
                <div class="access-map">
                    <?php echo $access_map ?>
                </div>
            </div>
           </section>
     </main>
<?php get_footer(); ?>
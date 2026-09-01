<?php
/**
 * Template Name: Design Portfolio
 *
 * Creative/graphic design gallery — masonry grid + lightbox.
 * Images auto-load from assets/images/design-portfolio/ (glob), so naye images
 * folder mein daalne se khud gallery mein aa jayenge.
 *
 * @package YourFirmGrowth
 */

get_header();

$dp_dir   = trailingslashit( get_template_directory() ) . 'assets/images/design-portfolio/';
$dp_uri   = trailingslashit( YFG_URI ) . 'assets/images/design-portfolio/';
$dp_files = glob( $dp_dir . '*.{jpg,jpeg,png,webp}', GLOB_BRACE );
if ( ! is_array( $dp_files ) ) {
	$dp_files = array();
}
natcasesort( $dp_files );
$dp_files = array_values( $dp_files );
$dp_count = count( $dp_files );
?>

<style>
/* Scoped .dp-* — koi generic .btn / global reset nahi (theme header/footer safe) */
.dp-page{--n:#072F58;--nd:#041D3A;--t:#038791;--td:#026870;--tl:#E0F5F5;--tm:#A8E3E6;--w:#fff;--bg:#F4F7FB;--mut:#536070;--bor:#D4DFEE}
.dp-container{width:100%;max-width:1280px;margin:0 auto;padding:0 24px}

/* Hero banner */
.dp-hero{position:relative;overflow:hidden;padding:92px 0 82px;text-align:center;background:linear-gradient(150deg,var(--nd) 0%,var(--n) 55%,#0A3D5C 100%);color:#fff}
.dp-hero::before{content:'';position:absolute;top:-120px;right:-90px;width:520px;height:520px;background:radial-gradient(circle,rgba(3,135,145,.22) 0%,transparent 70%);pointer-events:none}
.dp-hero::after{content:'';position:absolute;bottom:-150px;left:-90px;width:480px;height:480px;background:radial-gradient(circle,rgba(5,47,88,.4) 0%,transparent 70%);pointer-events:none}
.dp-hero__in{position:relative;z-index:1;max-width:760px;margin:0 auto;padding:0 24px}
.dp-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);color:var(--tm);font-size:.74rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;padding:8px 18px;border-radius:50px;margin-bottom:20px}
.dp-hero__title{font-size:clamp(2rem,4.6vw,3.1rem);font-weight:800;line-height:1.1;letter-spacing:-.02em;margin-bottom:14px; color: #fff;}
.dp-hero__title span{color:var(--t)}
.dp-hero__sub{font-size:1.08rem;color:rgba(255,255,255,.8);line-height:1.7;margin:0 auto;max-width:600px}
.dp-hero__count{display:inline-block;margin-top:22px;font-size:.82rem;font-weight:600;color:var(--tm);background:rgba(3,135,145,.18);border:1px solid rgba(3,135,145,.35);padding:6px 16px;border-radius:50px}

/* Masonry gallery */
.dp-sec{padding:56px 0 72px;background:var(--bg)}
.dp-masonry{column-count:4;column-gap:18px}
@media(max-width:1100px){.dp-masonry{column-count:3}}
@media(max-width:760px){.dp-masonry{column-count:2}}
@media(max-width:460px){.dp-masonry{column-count:1;column-gap:0}}
.dp-item{break-inside:avoid;-webkit-column-break-inside:avoid;margin:0 0 18px;border-radius:12px;overflow:hidden;position:relative;cursor:pointer;background:#e7edf5;box-shadow:0 2px 12px rgba(7,47,88,.10);transition:box-shadow .25s,transform .25s}
.dp-item:hover{box-shadow:0 14px 40px rgba(7,47,88,.20);transform:translateY(-3px)}
.dp-item img{width:100%;height:auto;display:block;transition:transform .45s ease}
.dp-item:hover img{transform:scale(1.05)}
.dp-item__ov{position:absolute;inset:0;background:linear-gradient(180deg,transparent 55%,rgba(4,29,58,.55));opacity:0;transition:opacity .25s;display:flex;align-items:flex-end;justify-content:flex-end;padding:12px}
.dp-item:hover .dp-item__ov{opacity:1}
.dp-item__zoom{width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.92);color:var(--n);display:flex;align-items:center;justify-content:center;font-size:1rem}
.dp-empty{text-align:center;color:var(--mut);padding:60px 0;font-size:1rem}

/* Lightbox */
.dp-lb{position:fixed;inset:0;z-index:100000;display:none;align-items:center;justify-content:center;background:rgba(4,17,34,.92);padding:24px}
.dp-lb.is-open{display:flex}
.dp-lb__img{max-width:92vw;max-height:86vh;border-radius:8px;box-shadow:0 20px 60px rgba(0,0,0,.5);object-fit:contain}
.dp-lb__btn{position:absolute;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;width:46px;height:46px;border-radius:50%;font-size:1.4rem;line-height:1;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background .18s}
.dp-lb__btn:hover{background:rgba(255,255,255,.28)}
.dp-lb__close{top:20px;right:22px}
.dp-lb__prev{left:20px;top:50%;transform:translateY(-50%)}
.dp-lb__next{right:20px;top:50%;transform:translateY(-50%)}
.dp-lb__count{position:absolute;bottom:20px;left:50%;transform:translateX(-50%);color:rgba(255,255,255,.85);font-size:.85rem;font-weight:600;background:rgba(0,0,0,.35);padding:5px 14px;border-radius:50px}
@media(max-width:600px){.dp-lb__prev{left:10px}.dp-lb__next{right:10px}.dp-lb__btn{width:40px;height:40px}}
body.dp-lb-open{overflow:hidden}
</style>

<main class="dp-page">

  <!-- ══ HERO ══ -->
  <section class="dp-hero">
    <div class="dp-hero__in">
      <span class="dp-eyebrow"><i class="bi bi-palette-fill"></i> Creative Portfolio</span>
      <h1 class="dp-hero__title">Our Design <span>Portfolio</span></h1>
      <p class="dp-hero__sub">A showcase of the marketing creatives, social media graphics, and brand designs our team has produced for clients.</p>
      <?php if ( $dp_count ) : ?>
        <span class="dp-hero__count"><i class="bi bi-images"></i> <?php echo (int) $dp_count; ?> designs</span>
      <?php endif; ?>
    </div>
  </section>

  <!-- ══ GALLERY ══ -->
  <section class="dp-sec">
    <div class="dp-container">
      <?php if ( $dp_count ) : ?>
        <div class="dp-masonry">
          <?php foreach ( $dp_files as $dp_i => $dp_f ) : $dp_name = basename( $dp_f ); ?>
            <figure class="dp-item" data-full="<?php echo esc_url( $dp_uri . $dp_name ); ?>" data-i="<?php echo (int) $dp_i; ?>">
              <img src="<?php echo esc_url( $dp_uri . $dp_name ); ?>" alt="Design work <?php echo (int) ( $dp_i + 1 ); ?>" loading="lazy">
              <span class="dp-item__ov"><span class="dp-item__zoom"><i class="bi bi-arrows-fullscreen"></i></span></span>
            </figure>
          <?php endforeach; ?>
        </div>
      <?php else : ?>
        <p class="dp-empty">No designs to show yet.</p>
      <?php endif; ?>
    </div>
  </section>

</main>

<!-- ══ LIGHTBOX ══ -->
<div class="dp-lb" id="dp-lightbox" aria-hidden="true">
  <button class="dp-lb__btn dp-lb__close" data-dp-close aria-label="Close">&times;</button>
  <button class="dp-lb__btn dp-lb__prev" data-dp-prev aria-label="Previous">&#10094;</button>
  <img class="dp-lb__img" id="dp-lb-img" src="" alt="Design preview">
  <button class="dp-lb__btn dp-lb__next" data-dp-next aria-label="Next">&#10095;</button>
  <span class="dp-lb__count" id="dp-lb-count"></span>
</div>

<script>
( function () {
  var items = Array.prototype.slice.call( document.querySelectorAll( '.dp-item' ) );
  if ( ! items.length ) { return; }
  var lb = document.getElementById( 'dp-lightbox' );
  var lbImg = document.getElementById( 'dp-lb-img' );
  var lbCount = document.getElementById( 'dp-lb-count' );
  var srcs = items.map( function ( el ) { return el.getAttribute( 'data-full' ); } );
  var cur = 0;

  function show( i ) {
    cur = ( i + srcs.length ) % srcs.length;
    lbImg.src = srcs[ cur ];
    lbCount.textContent = ( cur + 1 ) + ' / ' + srcs.length;
  }
  function open( i ) { show( i ); lb.classList.add( 'is-open' ); lb.setAttribute( 'aria-hidden', 'false' ); document.body.classList.add( 'dp-lb-open' ); }
  function close() { lb.classList.remove( 'is-open' ); lb.setAttribute( 'aria-hidden', 'true' ); document.body.classList.remove( 'dp-lb-open' ); lbImg.src = ''; }

  items.forEach( function ( el, i ) { el.addEventListener( 'click', function () { open( i ); } ); } );

  lb.addEventListener( 'click', function ( e ) {
    if ( e.target.closest( '[data-dp-close]' ) || e.target === lb ) { close(); return; }
    if ( e.target.closest( '[data-dp-prev]' ) ) { show( cur - 1 ); return; }
    if ( e.target.closest( '[data-dp-next]' ) ) { show( cur + 1 ); return; }
  } );
  document.addEventListener( 'keydown', function ( e ) {
    if ( ! lb.classList.contains( 'is-open' ) ) { return; }
    if ( 'Escape' === e.key ) { close(); }
    else if ( 'ArrowLeft' === e.key ) { show( cur - 1 ); }
    else if ( 'ArrowRight' === e.key ) { show( cur + 1 ); }
  } );
} )();
</script>

<?php get_footer(); ?>

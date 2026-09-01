CUSTOM REVIEWS WIDGET — Install aur Use Guide
=================================================

Ye plugin bilkul Trustindex ke slider widget jaisa dikhta hai (Google icon,
Trustindex icon, verified badge, stars, slider arrows) — lekin fully free
hai, koi trial expire nahi hoga.

1) INSTALL KAISE KARO
----------------------
- "custom-reviews-widget" folder ko zip karo (agar already zip nahi hai)
- WordPress Admin > Plugins > Add New > Upload Plugin
- Zip file select karo, Install karo, phir "Activate" pe click karo
- Activate hote hi 10 purane reviews (5 Google + 5 Trustindex) automatic
  add ho jayenge

2) REVIEWS MANAGE KAISE KARO
------------------------------
- WordPress Admin sidebar mein "My Reviews" (star icon) pe jao
- Wahan se naya review Add karo, ya purane ko Edit/Delete karo
- Fields: Naam, Source (Google/Trustindex/Custom), Rating, Review Text,
  Profile Image URL (optional — na do to naam ka pehla letter dikhega),
  Date Text (jaise "today", "2 days ago"), Verified badge on/off, Order

3) WEBSITE PE DIKHANE KE LIYE SHORTCODE
------------------------------------------
Kisi bhi page/post mein ye shortcode paste karo:

  [firm_reviews]                     -> sab reviews (Google + Trustindex + Custom)
  [firm_reviews source="google"]     -> sirf Google reviews
  [firm_reviews source="trustindex"] -> sirf Trustindex reviews
  [firm_reviews source="custom"]     -> sirf tumhare khud ke likhe reviews
  [firm_reviews limit="10"]          -> max kitne reviews dikhane hain

4) NOTES
--------
- Ye poori tarah free hai — koi subscription, trial ya third-party
  dependency nahi
- Design CSS mein hai: assets/css/style.css — colors/spacing wahan se
  change kar sakte ho
- Naye reviews jab Google/Trustindex pe aayen, unhe manually "My Reviews"
  panel se add karna hoga (kyunke ye live API se connect nahi, static/apna
  system hai)

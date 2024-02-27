<?= view('common/head'); ?>
<ul id="myUL">
  <li><span class="caret" hx-get="/sampark/public/getNagarBasti?nagar_id=4" hx-trigger="click" hx-target="#basti" hx-swap="outerHTML">nagar</span>
    <ul id="basti" class="nested">
      <li>Water</li>
      <li>Coffee</li>
      <li><span class="caret">Tea</span>
        <ul class="nested">
          <li>Black Tea</li>
          <li>White Tea</li>
          <li><span class="caret">Green Tea</span>
            <ul class="nested">
              <li>Sencha</li>
              <li>Gyokuro</li>
              <li>Matcha</li>
              <li>Pi Lo Chun</li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

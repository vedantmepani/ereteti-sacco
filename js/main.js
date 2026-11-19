// js/main.js — Lab 3, Steps 4 and 5 only.
// Blocks 1–3 (litres check, member-number check, delivery form) are not
// in this file yet: this site's deliveries page has no delivery form
// (#delivery-form, #litres, #member do not exist in deliveries.html),
// so those blocks have nothing to attach to. That is Lab 3 work still
// to do. Blocks 4 and 5 below are the ones Lab 5 needs: the routes
// filter, and the accepted total on deliveries.php.

// ---- 4. routes.html: the routes, filtered as you type

const search = document.querySelector('#route-search');
const routeCount = document.querySelector('#route-count');
const routeSections = document.querySelectorAll('main section');

function filterRoutes() {
  const wanted = search.value.trim().toLowerCase();
  let shown = 0;

  for (const section of routeSections) {
    const words = section.textContent.toLowerCase();
    if (words.includes(wanted)) {
      section.hidden = false;
      shown = shown + 1;
    } else {
      section.hidden = true;
    }
  }

  routeCount.textContent =
    shown + ' of ' + routeSections.length + ' routes';
}

if (search) {
  search.addEventListener('input', filterRoutes);
}

// ---- 5. deliveries.html: the accepted total

const totalCell = document.querySelector('#accepted-total');

if (totalCell) {
  const rows = document.querySelectorAll('tbody tr');
  let total = 0;

  for (const row of rows) {
    const cells = row.querySelectorAll('td');
    if (cells[4].textContent === 'Yes') {
      total = total + Number(cells[3].textContent);
    }
  }

  totalCell.textContent = total.toFixed(2);
}

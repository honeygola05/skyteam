<style>
.plane-body {
  position: relative;
  display: flex;
  gap: 10px;
  align-items: flex-start;
  padding-top: 40px; /* space for the wings line */
}

/* Example seat layout styling */
.seat-column {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.seat {
  background: #e0f2fe;
  border: 1px solid #bae6fd;
  border-radius: 6px;
  padding: 5px 10px;
  margin: 2px 0;
}

.aisle {
  height: 10px;
}

/* Invisible markers */

.wing-line {
  position: absolute;
  top: 5px;
  height: 2px;
  background: #64748b;
}

.wing-line span {
  position: absolute;
  top: -16px;
  left: 50%;
  transform: translateX(-50%);
  background: #e5f4ff;
  padding: 0 6px;
  font-size: 14px;
  color: #334155;
  font-weight: 500;
}

</style>
<div class="plane-body">
  <div class="seat-column">
    <div class="seat" data-seat="10A">10A</div>
    <div class="seat" data-seat="10B">10B</div>
    <div class="seat" data-seat="10C">10C</div>
    <div class="aisle"></div>
    <div class="seat" data-seat="10D">10D</div>
    <div class="seat" data-seat="10E">10E</div>
    <div class="seat" data-seat="10F">10F</div>
  </div>
  <div class="wings-start"></div>
  <div class="seat-column">
    <div class="seat" data-seat="11A">11A</div>
    <div class="seat" data-seat="11B">11B</div>
    <div class="seat" data-seat="11C">11C</div>
    <div class="aisle"></div>
    <div class="seat" data-seat="11D">11D</div>
    <div class="seat" data-seat="11E">11E</div>
    <div class="seat" data-seat="11F">11F</div>
  </div>
  <div class="seat-column">
    <div class="seat" data-seat="12A">12A</div>
    <div class="seat" data-seat="12B">12B</div>
    <div class="seat" data-seat="12C">12C</div>
    <div class="aisle"></div>
    <div class="seat" data-seat="12D">12D</div>
    <div class="seat" data-seat="12E">12E</div>
    <div class="seat" data-seat="12F">12F</div>
  </div>
  <div class="seat-column">
    <div class="seat" data-seat="13A">13A</div>
    <div class="seat" data-seat="13B">13B</div>
    <div class="seat" data-seat="13C">13C</div>
    <div class="aisle"></div>
    <div class="seat" data-seat="13D">13D</div>
    <div class="seat" data-seat="13E">13E</div>
    <div class="seat" data-seat="13F">13F</div>
  </div>
  <div class="seat-column">
    <div class="seat" data-seat="14A">14A</div>
    <div class="seat" data-seat="14B">14B</div>
    <div class="seat" data-seat="14C">14C</div>
    <div class="aisle"></div>
    <div class="seat" data-seat="14D">14D</div>
    <div class="seat" data-seat="14E">14E</div>
    <div class="seat" data-seat="14F">14F</div>
  </div>
  <div class="seat-column">
    <div class="seat" data-seat="15A">15A</div>
    <div class="seat" data-seat="15B">15B</div>
    <div class="seat" data-seat="15C">15C</div>
    <div class="aisle"></div>
    <div class="seat booked" data-seat="15D">15D</div>
    <div class="seat booked" data-seat="15E">15E</div>
    <div class="seat booked" data-seat="15F">15F</div>
  </div>
  <div class="seat-column">
    <div class="seat" data-seat="16A">16A</div>
    <div class="seat" data-seat="16B">16B</div>
    <div class="seat" data-seat="16C">16C</div>
    <div class="aisle"></div>
    <div class="seat booked" data-seat="16D">16D</div>
    <div class="seat booked" data-seat="16E">16E</div>
    <div class="seat booked" data-seat="16F">16F</div>
  </div>
  <div class="seat-column">
    <div class="seat" data-seat="17A">17A</div>
    <div class="seat" data-seat="17B">17B</div>
    <div class="seat" data-seat="17C">17C</div>
    <div class="aisle"></div>
    <div class="seat" data-seat="17D">17D</div>
    <div class="seat" data-seat="17E">17E</div>
    <div class="seat" data-seat="17F">17F</div>
  </div>
  <div class="wings-end"></div>
  <div class="seat-column">
    <div class="seat" data-seat="29A">29A</div>
    <div class="seat" data-seat="29B">29B</div>
    <div class="seat" data-seat="29C">29C</div>
    <div class="aisle"></div>
    <div class="seat" data-seat="29D">29D</div>
    <div class="seat" data-seat="29E">29E</div>
    <div class="seat" data-seat="29F">29F</div>
  </div>
  <div class="seat-column">
    <div class="seat booked" data-seat="30A">30A</div>
    <div class="seat booked" data-seat="30B">30B</div>
    <div class="seat booked" data-seat="30C">30C</div>
    <div class="aisle"></div>
    <div class="seat booked" data-seat="30D">30D</div>
    <div class="seat booked" data-seat="30E">30E</div>
    <div class="seat booked" data-seat="30F">30F</div>
  </div>
</div>
<script>
  const plane = document.querySelector('.plane-body');
const start = document.querySelector('.wings-start');
const end = document.querySelector('.wings-end');

const line = document.createElement('div');
line.classList.add('wing-line');
line.innerHTML = '<span>Wings</span>';
plane.appendChild(line);

function positionWingLine() {
  const startRect = start.getBoundingClientRect();
  const endRect = end.getBoundingClientRect();
  const planeRect = plane.getBoundingClientRect();

  line.style.left = (startRect.right - planeRect.left) + 'px';
  line.style.width = (endRect.left - startRect.right) + 'px';
}
positionWingLine();
window.addEventListener('resize', positionWingLine);

</script>
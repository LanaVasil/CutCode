
// console.log('jfhdskjfhdsjkghdfjkh')

window.addEventListener('scroll', function () {
  document.getElementById('header-nav').classList.toggle('headernav-scroll', window.scrollY > 135);
});

// �������� �� �������� ���� ��������� ���������
// 13:55 ���������� ������� ��������-�������� �� Bootstrap 5. ���� 9.mp4
const offcanvasCartEl = document.getElementById('offcanvasCart');
const offcanvasCart = new bootstrap.Offcanvas(offcanvasCartEl);

document.getElementById('package-open').addEventListener('click', (e) => {
  e.preventDefault();
  offcanvasCart.toggle();
});

document.querySelectorAll('.closecart').forEach(item => {
  item.addEventListener('click', (e) => {
    e.preventDefault();
    offcanvasCart.hide();
    let href = item.dataset.href;
    document.getElementById(href).scrollIntoView();
  });
});
// ./�������� �� �������� ���� ��������� ���������

// ������ ���������� �� ������� ��� ������
let calcScrollValue = () => {
  let scrollProgress = document.getElementById("progress");
  let progressValue = document.getElementById("progress-value");
  let pos = document.documentElement.scrollTop;
  let calcHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  let scrollValue = Math.round((pos * 100) / calcHeight);
  if (pos > 100) {
    scrollProgress.style.display = "grid";
  } else {
    scrollProgress.style.display = "none";
  }
  scrollProgress.addEventListener("click", () => {
    document.documentElement.scrollTop = 0;
  });
  scrollProgress.style.background = `conic-gradient(#ffd333 ${scrollValue}%, #e2e3e5 ${scrollValue}%)`;
};
window.onscroll = calcScrollValue;
window.onload = calcScrollValue;
// ./������ ���������� �� ������� ��� ������
if (document.querySelector('.slider-main')) { }



window.addEventListener("load", (event) => {
  console.log("page is fully loaded");
  // ���������� localStorage, �� ���������� ��������� davices � �����-������� ����
    // if (targetElement.classList.contains('cart-header__icon')) {
      for (let i=0; i<localStorage.length; i++){
        let key = localStorage.key(i)
        if (localStorage.getItem(key) !=='0' && key.indexOf('cart') !== -1){
          console.log(`${key}: ${localStorage.getItem(key)}`);
          console.log(key.slice(4));

          transferCart(key.slice(4), localStorage.getItem(key));
        }
      }
});

window.onload = function () {
  // ���������� ���� �� ����������
  document.addEventListener("click", documentActions);
  function documentActions(e) {
    const targetElement = e.target;

    // ���� �� ������ ������ �������� � �����
    if (targetElement.classList.contains('item-device__button')) {
      // alert('item-device__button');
      const deviceId = targetElement.closest('.item-device').dataset.pid;
      addToCart(targetElement, deviceId);
      e.preventDefault();
    }

    // � ��������� ����� ��������� Device 3:58:49
    if (targetElement.classList.contains('cart-list__delete')) {
      const deviceId = targetElement.closest('.cart-list__item').dataset.cartPid;
      updateCart(targetElement, deviceId, false);
      e.preventDefault();
    }

  }
}


// Offcanvas-�����: ������� device
function addToCart(deviceButton, deviceId) {

  // alert(deviceId);

  // �������� �� ��������� � class �������� _hold, �� ���������
  if (!deviceButton.classList.contains('_hold')) {
    deviceButton.classList.add('_hold');
    deviceButton.classList.add('_fly');

    const cart = document.querySelector('.cart-header__icon');
    const device = document.querySelector(`[data-pid="${deviceId}"]`);
    const deviceImage = device.querySelector('.item-device__button');

    // ��������� ����� ���������� ��������
    const deviceImageFly = deviceImage.cloneNode(true);

    // ��������� ����� �� ���������� �����
    const deviceImageFlyWidth = deviceImage.offsetWidth;
    const deviceImageFlyHeight = deviceImage.offsetHeight;
    const deviceImageFlyLeft = deviceImage.getBoundingClientRect().left;
    // const deviceImageFlyLeft = deviceImage.getBoundingClientRect().right;
    const deviceImageFlyTop = deviceImage.getBoundingClientRect().top;
    // const deviceImageFlyTop = deviceImage.getBoundingClientRect().bottom;


    deviceImageFly.setAttribute('class', '_flyImage _ibg');
    deviceImageFly.style.cssText =
      `
      left: ${deviceImageFlyLeft}px;
      top: ${deviceImageFlyTop}px;
      width: ${deviceImageFlyWidth}px;
      height: ${deviceImageFlyHeight}px;
      fill: red;
      `;

    // ������ ���� (�������� � ����� body) 
    document.body.append(deviceImageFly);

    const cartFlyLeft = cart.getBoundingClientRect().left;
    const cartFlyTop = cart.getBoundingClientRect().top;

    deviceImageFly.style.cssText =
      `
      left: ${cartFlyLeft}px;
      top: ${cartFlyTop}px;
      width: ${deviceImageFlyWidth}px;
      height: ${deviceImageFlyHeight}px;
      fill: red;
      opacity:0;
      `;

    deviceImageFly.addEventListener('transitionend', function () {
      if (deviceButton.classList.contains('_fly')) {
        // ��������� ����� ���������� ��������
        deviceImageFly.remove();

        updateCart(deviceButton, deviceId);
        deviceButton.classList.remove('_fly');
      }
    });

  }
}

// Offcanvas-�����: ��������� ������� (����) �� ������ device
function updateCart(deviceButton, deviceId, deviceAdd = true) {
  const cart = document.querySelector('.cart-header');
  const cartIcon = cart.querySelector('.cart-header__icon');
  const cartQuantity = cartIcon.querySelector('span');
  const cartDevice = document.querySelector(`[data-cart-pid="${deviceId}"]`);
  const cartList = document.querySelector('.cart-list');

  // ������ device
  if (deviceAdd) {
    if (cartQuantity) {
      cartQuantity.innerHTML = ++cartQuantity.innerHTML;
    } else {
      cartIcon.insertAdjacentHTML('beforeend', `<span class="badge text-bg-warning cart-badge bg-warning rounded-circle">1</span>`);
      // 3:48:00
    }

    if (!cartDevice) {
      const device = document.querySelector(`[data-pid="${deviceId}"]`);
      const cartDeviceDevtype = device.querySelector('.item-device__devtype').innerHTML;
      const cartDeviceBrand = device.querySelector('.item-device__brand').innerHTML;
      const cartDeviceName = device.querySelector('.item-device__name').innerHTML;

      const cartDeviceContent = `
      <td class="cart-list__body"> 
      <p>${cartDeviceDevtype} ${cartDeviceBrand}</p>
      <p class="h5">${cartDeviceName}</p>
      </td>
      <td class="cart-list__quantity">&times;<span>1</span></td>
      <td><a href="" class="cart-list__delete">��������</a></td>
      `;
      cartList.insertAdjacentHTML('beforeend', `<tr data-cart-pid="${deviceId}" class="cart-list__item">${cartDeviceContent}</tr>`);

      localStorage.setItem('cart'+deviceId, 1);

    } else {
      const cartDeviceQuantity = cartDevice.querySelector('.cart-list__quantity span');
      cartDeviceQuantity.innerHTML = ++cartDeviceQuantity.innerHTML;

      localStorage.setItem('cart'+deviceId, cartDeviceQuantity.innerHTML);
    }

    // ��������� ����� _hold
    deviceButton.classList.remove('_hold');

  } else {
    // ��������� device
    const cartDeviceQuantity = cartDevice.querySelector('.cart-list__quantity span');
    cartDeviceQuantity.innerHTML = --cartDeviceQuantity.innerHTML;

    localStorage.setItem('cart'+deviceId, cartDeviceQuantity.innerHTML);

    if (!parseInt(cartDeviceQuantity.innerHTML)) {
      cartDevice.remove();
    }

    const cartQuantityValue = --cartQuantity.innerHTML;

    if (cartQuantityValue) {
      cartQuantity.innerHTML = cartQuantityValue;
    } else {
      cartQuantity.remove();
    }
  }

// for (let i=0; i<localStorage.length; i++){
//   let key = localStorage.key(i)
//   if (localStorage.getItem(key) !=='0' && key.indexOf('cart') !== -1){
//     console.log(`${key}: ${localStorage.getItem(key)}`);
//     console.log(key.slice(4));
//   }
// }

  // Offcanvas-�����: ��������� ������ �����:
  countTotal();
}

// ���������������� ��������: Offcanvas-�����: ���������� device ��������� � localStorage
function transferCart(deviceId, quantityId) {
  const cartList = document.querySelector('.cart-list');
  const cartDeviceContent = `
  <td class="cart-list__body"> 
  <p>cartDeviceDevtype cartDeviceBrand</p>
  <p class="h5">cartDeviceName</p>
  </td>
  <td class="cart-list__quantity">&times;<span>${quantityId}</span></td>
  <td><a href="" class="cart-list__delete">��������</a></td>
  `;
  cartList.insertAdjacentHTML('beforeend', `<tr data-cart-pid="${deviceId}" class="cart-list__item">${cartDeviceContent}</tr>`);

  // Offcanvas-�����: ��������� ������ �����:
  countTotal();
}

// Offcanvas-�����: ��������� ������ �����:
function countTotal(){

    const cart = document.querySelector('.cart-header');
    const cartIcon = cart.querySelector('.cart-header__icon');
    const cartQuantity = cartIcon.querySelector('span');

    // ��������� ��� ������ �����:
    const cartTotal = document.querySelectorAll('.cart-list__quantity span');
    let sum = Array.from(cartTotal).reduce((accum,item)=> accum += +item.textContent, 0);
    // console.log(sum);
    document.querySelector('.cart-list__total').textContent = sum;
  
    if (cartQuantity === null) {
    cartIcon.insertAdjacentHTML('beforeend', `<span class="badge text-bg-warning cart-badge bg-warning rounded-circle">${sum}</span>`);
    }
}




// import '../css/app.css';
// import '../css/trix.css'; ����������� css

// import viteConfig from "../../vite.config";

// �������� � vite.config.js
// @ => 'resources/js'
// ������ JS � ����� component
// import '@/Title.js'







// ������ ���� Laravel 10 _ ���������� + ¸�����.mp4
//import './components/trix.js';

// ��������� ��� �������� ������������ �� ����� public/build
// import.meta.glob(['../img/**']);

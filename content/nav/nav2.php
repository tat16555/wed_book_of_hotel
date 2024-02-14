<style>
    /* CSS สำหรับรายการแบบเช็คบล็อก */
    .list-unstyled {
        border: 1px solid #000; /* เพิ่มเส้นขอบสีดำ */
        padding: 10px; /* เพิ่มระยะห่างด้านใน */
        border-radius: 5px; /* ปรับมุมขอบ */
    }

    .list-unstyled h4 {
        margin-bottom: 10px; /* ปรับระยะห่างระหว่างหัวข้อแถบกับรายการ */
    }

    .list-unstyled li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 5px;
    }

    .list-unstyled li input[type="checkbox"] {
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }
</style>
<ul class="list-unstyled">
    <h4>เลือกประเภท</h4>
    <p>ประเภทที่พัก</p>
    <li>
        <input type="checkbox" id="Accommodation type" name="type" value="Hotel">
        <label for="hotelType">Hotel</label>
    </li>
    <li>
        <input type="checkbox" id="Accommodation type" name="type" value="Apartment">
        <label for="province">Apartment</label>
    </li>
    <li>
        <input type="checkbox" id="Accommodation type" name="type" value="Resort">
        <label for="starRating">Resort</label>
    </li>
    <li>
        <input type="checkbox" id="Accommodation type" name="type" value="Villa">
        <label for="starRating">Villa</label>
    </li>
    <p>จังหวัดที่พัก</p>
    <li>
        <input type="checkbox" id="provinceType" name="type" value="Bangkok">
        <label for="hotelType">กรุงเทพมหานคร</label>
    </li>
    <li>
        <input type="checkbox" id="provinceType" name="type" value="Chiang-Ma">
        <label for="province">เชียงใหม่</label>
    </li>
    <li>
        <input type="checkbox" id="provinceType" name="type" value="Pattaya">
        <label for="starRating">พัทยา</label>
    </li>
    <li>
        <input type="checkbox" id="provinceType" name="type" value="Phuket">
        <label for="starRating">ภูเก็ต</label>
    </li>
    <li>
        <input type="checkbox" id="provinceType" name="type" value="Krabi">
        <label for="starRating">กระบี่</label>
    </li>
    <p>ระดับที่พัก</p>
    <li>
        <input type="checkbox" id="star" name="type" value="1star">
        <label for="hotelType">1 ดาว</label>
    </li>
    <li>
        <input type="checkbox" id="star" name="type" value="2star">
        <label for="province">2 ดาว</label>
    </li>
    <li>
        <input type="checkbox" id="star" name="type" value="3star">
        <label for="starRating">3 ดาว</label>
    </li>
    <li>
        <input type="checkbox" id="star" name="type" value="4star">
        <label for="starRating">4 ดาว</label>
    </li>
    <li>
        <input type="checkbox" id="star" name="type" value="5star">
        <label for="starRating">5 ดาว</label>
    </li>
</ul>

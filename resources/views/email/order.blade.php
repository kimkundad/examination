<div style="font-family:verdana;font-size:12px;color:#555555;line-height:14pt">
<div style="width:590px">
<div style="background:url('{{url('assets/image/email_top.png')}}') no-repeat;width:100%;height:112px;display:block">
<div style="padding-top:15px;padding-left:50px;padding-right:50px">
<a href="#" target="_blank" ><img src="{{url('assets/image/new_logo/Learnsbuy_New_Logo_mail.png')}}" alt=""
  style="border:none; height:82px; width:82px" ></a>
</div>
</div>
<div style="background:url('{{url('assets/image/email_mid.png')}}')
repeat-y;width:100%;display:block">
<div style="padding-left:50px;padding-right:50px;padding-bottom:1px">
<div style="border-bottom:1px solid #ededed"></div>
<div style="margin:20px 0px;font-size:30px;line-height:30px;text-align:left">ขอขอบคุณ</div>
<div style="margin-bottom:30px">
<div>คุณสั่งซื้อข้อสอบ {{$data->ex_name}}</div>
<br>
<div style="margin-bottom:20px;text-align:left">
  <b>หมายเลขคำสั่งซื้อ:</b> {{$data->order_id}}<br>
  <b>วันที่สั่งซื้อ:</b> {{$datatime}}</div>
</div>
<div>
<div>
</div>
<span></span>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:left;font-weight:bold;font-size:12px">รายการ</td>
<td style="text-align:right;font-weight:bold;font-size:12px" width="70">ราคา</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
</tr>
    <tr>
      <td style="text-align:left;font-size:12px;padding-right:10px">
        <span>{{$data->ex_name}}</span>
      </td>
      <td style="text-align:right;font-size:12px">
        <span>THB{{$data->price}}</span>
        <span></span>
      </td>
    </tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed">
</div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:right;font-size:12px" width="150">
ภาษี: <span>THB0.00</span>
</td>
</tr>
<tr>
<td style="text-align:right;font-size:12px" width="150">
<span>ส่วนลด: </span>THB 0
</td>
</tr>
<tr>
<td style="text-align:right;font-size:12px" width="150">
<span>รวม: </span>THB{{$data->price}}
</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>

<table style="width:100%;margin:5px 0 15px 0;padding:0;border-spacing:0">
  <tbody>
    <tr>
    <td style="text-align:left;font-weight:bold;font-size:12px;vertical-align:top">วิธีชำระเงิน:</td>
      <td>
        <table style="margin-left:auto;font-size:12px">
          <tbody>
          <tr>
              <td style="font-size:12px;text-align:right">
              ธนาคารกสิกรไทย (ภาษาญี่ปุ่น)
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
              อ.พรหมเทพ ชัยกิตติวณิชย์
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
              026-226-1532
              </td>
            </tr>
           
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0 15px 0;padding:0;border-spacing:0">
  <tbody>
    <tr>
   
      <td>
        <table style="margin-left:auto;font-size:12px">
          <tbody>
          <tr>
              <td style="font-size:12px;text-align:right">
              ธนาคารไทยพาณิชย์ (ภาษาญี่ปุ่น)
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
              อ.พรหมเทพ ชัยกิตติวณิชย์
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
              227-204-4159
              </td>
            </tr>
            
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0 15px 0;padding:0;border-spacing:0">
  <tbody>
    <tr>
      <td>
        <table style="margin-left:auto;font-size:12px">
          <tbody>
          <tr>
              <td style="font-size:12px;text-align:right">
              ธนาคารกรุงไทย (ภาษาญี่ปุ่น)
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
              อ.พรหมเทพ ชัยกิตติวณิชย์
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
              981-169-5903
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
                
                <a href="{{url('payment_user/'.$data->order_id)}}" target="_blank" >แจ้งการชำระเงิน</a>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>

</div><div style="margin:20px 0">หากมีคำถาม ติดต่อ <a href="#" target="_blank" >02 658 3819</a>
</div><div style="border-bottom:1px solid #ededed"></div>
<div style="margin:10px 5px;display:inline-block">
<table>
<tbody>
<tr>
<td style="vertical-align:top">
<div style="margin-right:8px;margin-top:3px">
<img src="{{url('assets/image/new_logo/Learnsbuy_New_Logo_mail2.png')}}" style="border:none; height:48px;" class="CToWUd">
</div>
</td>
<td style="vertical-align:top;font-size:12px;color:#555555;line-height:16px">
<div style="font-size:14px;font-weight:bold;margin-bottom:8px">Learnsbuy</div>
<div style="margin-bottom:8px">เรียนภาษาญี่ปุ่นออนไลน์ง่ายๆ กับครูพี่โฮม ZA-SHI ได้รับการยอมรับจริงจากสื่อชั้นนำ อาทิ GMM, Dek-D, True, ETV องค์กรภาครัฐและเอกชน <a href="#" target="_blank" >
เรียนรู้เพิ่มเติม</a><a href="#" style="font-family:'Droid Sans',Arial,sans-serif;color:#4db8ca;font-size:150%;
text-decoration:none;padding-left:4px;line-height:12px" target="_blank" >›</a>
</div></td></tr>
</tbody>
</table>
</div>
<div style="border-bottom:1px solid #ededed">
</div>

<div style="margin:20px 0 40px 0;font-size:10px;color:#707070">
ดู<a href="#" target="_blank">ประวัติการสั่งซื้อ</a>
บน Learnsbuy ข้อมูลส่วนตัวของคุณ<br>
ดู<a href="#" target="_blank" >นโยบายการคืนเงิน</a>ของ Learnsbuy และ<a href="#" target="_blank">ข้อกำหนดในการให้บริการ</a>
</div>
<div style="font-size:9px;color:#707070">

<br>© 2020 Learnsbuy | สงวนลิขสิทธิ์<br></div>
</div></div>
<div class="yj6qo"></div>
<div style="background:url('{{url('assets/image/email_bottom.png')}}') no-repeat;width:100%;height:50px;display:block"></div></div></div>

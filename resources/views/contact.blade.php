@extends('layouts.template')

@section('title')
お問い合わせ
@endsection

@section('content')
<div id="app" class="all" style="display:none">
  <h3>お問い合わせ</h3>
  <form action="{{route('confirm')}}" method="POST">
    @csrf

    <table class="contact_table">
      <tr>
        <th class="contact_th" rowspan="3">お名前 <span class="red_text">※</span></th>
        <td class="contact_td">
          <input v-on:blur="addMessageName" v-on:input="lname_v=$event.target.value" class="contact_txt_lname" type="text" name="last_name" value="{{$form['last_name']}}">
          <input v-on:blur="addMessageName" v-on:input="fname_v=$event.target.value" class="contact_txt_fname" type="text" name="first_name" value="{{$form['first_name']}}">
        </td>
      </tr>
      <tr>
        <td class="contact_td_example">
          <p class="contact_txt_ex_lname">例）山田</p>
          <p class="contact_txt_ex_fname">例）太郎</p>
        </td>
      </tr>
      <tr>
        <td class="contact_td_error">

          @if ($errors->has('last_name'))
            {{ $errors->first('last_name')}}
          @else
            @{{ message_name }}
          @endif
          
          @if ($errors->has('first_name'))
          {{ $errors->first('first_name')}}
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact_th">性別 <span class="red_text">※</span></th>
        @if ($form['gender'] == 1 || $form['gender'] == null)
          <td class="contact_td">
            <label class="contact_radio_label"><input class="contact_radio_m" type="radio" name="gender" value="1" checked>男性</label>
            <label class="contact_radio_label"><input class="contact_radio_w" type="radio" name="gender" value="2">女性</label>
          </td>
        @elseif ($form['gender'] == 2)
          <td class="contact_td">
            <label class="contact_radio_label"><input class="contact_radio_m" type="radio" name="gender" value="1">男性</label>
            <label class="contact_radio_label"><input class="contact_radio_w" type="radio" name="gender" value="2" checked>女性</label>
          </td>
        @endif
      </tr>

      <tr>
        <th class="contact_th" rowspan="3">メールアドレス <span class="red_text">※</span></th>
        <td class="contact_td">
          <input v-on:blur="addMessageEmail" v-on:input="email_v=$event.target.value" class="contact_txt_email" type="text" name="email" value="{{$form['email']}}">
        </td>
      </tr>
      <tr>
        <td class="contact_td_example">
          <p class="contact_txt_ex_lname">例）test@example.com</p>
        </td>
      </tr>
      <tr>
        <td class="contact_td_error">
          @if ($errors->has('email'))
            {{ $errors->first('email')}}
          @else
            @{{ message_email }}
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact_th" rowspan="3">郵便番号 <span class="red_text">※</span></th>
        <td class="contact_td"><span  class="contact_radio_label">〒　</span><input v-on:blur="addMessagePostcode" v-on:change="getAddress" v-on:input="postcode_v=$event.target.value" class="contact_txt_post" type="text" name="postcode" value="{{$form['postcode']}}"></td>
      </tr>
      <tr>
        <td class="contact_td_example">
          <p class="contact_txt_ex_lname">例）123-4567</p>
        </td>
      </tr>
      <tr>
        <td class="contact_td_error">
          @if ($errors->has('postcode'))
            {{ $errors->first('postcode')}}
          @else
            @{{ message_postcode }}
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact_th" rowspan="3">住所 <span class="red_text">※</span></th>
        <td class="contact_td">
            <input v-if="post_flag" v-on:blur="addMessageAddress" v-on:input="address_v=$event.target.value" class="contact_txt_email" type="text" name="address" value="{{$form['address']}}">
            <input v-else v-on:blur="addMessageAddress" v-model="address_v" class="contact_txt_email" type="text" name="address">
        </td>
      </tr>
      <tr>
        <td class="contact_td_example">
          <p class="contact_txt_ex_lname">例）東京都渋谷区千駄ヶ谷1-2-3</p>
        </td>
      </tr>
      <tr>
        <td class="contact_td_error">
          

          @if ($errors->has('address'))
            {{ $errors->first('address')}}
          @else
            @{{ message_address }}
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact_th" rowspan="3">建物名</th>
        <td class="contact_td"><input class="contact_txt_email" type="text" name="building_name" value="{{$form['building_name']}}"></td>
      </tr>
      <tr>
        <td class="contact_td_example">
          <p class="contact_txt_ex_lname">例）千駄ヶ谷マンション101</p></td>
      </tr>
      <tr>
        <td class="contact_td_error">
          @if ($errors->has('building_name'))
          {{ $errors->first('building_name')}}
          @endif
        </td>
      </tr>


      <tr>
        <th class="contact_th" rowspan="2">ご意見 <span class="red_text">※</span></th>
        <td class="contact_td">
          <textarea v-on:blur="addMessageOpinion" v-on:input="opinion_v=$event.target.value" class="contact_txt_opinion" name="opinion">{{$form['opinion']}}</textarea>
        </td>
      </tr>
      <tr>
        <td class="contact_td_error">
          

          @if ($errors->has('opinion'))
            {{ $errors->first('opinion')}}
          @else
            @{{ message_opinion }}
          @endif
        </td>
      </tr>
    </table>

    <input class="contact_button" type="submit" value="確認">

  </form>
</div>

<script src=" {{ mix('js/app.js') }} "></script>

@endsection
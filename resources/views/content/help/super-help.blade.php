@extends('layouts/contentNavbarLayout')

@section('title', 'Help - ChatBox')

@section('content')
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>
  /* **********************************
Reset CSS
************************************** */

html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
b,
u,
i,
center,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
embed,
figure,
figcaption,
footer,
header,
hgroup,
menu,
nav,
output,
ruby,
section,
summary,
time,
mark,
audio,
video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}


/* HTML5 display-role reset for older browsers */

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section {
  display: block;
}

body {
  line-height: 1.5;
}

ol,
ul {
  list-style: none;
}

blockquote,
q {
  quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
q:after {
  content: '';
  content: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}


/********************************
Typography Style
******************************** */

body {
  margin: 0;
  font-family: 'Open Sans', sans-serif;
  line-height: 1.5;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

html {
  min-height: 100%;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

h1 {
  font-size: 36px;
}

h2 {
  font-size: 30px;
}

h3 {
  font-size: 26px;
}

h4 {
  font-size: 22px;
}

h5 {
  font-size: 18px;
}

h6 {
  font-size: 16px;
}

p {
  font-size: 15px;
}

a {
  text-decoration: none;
  font-size: 15px;
}

* {
margin-bottom: 0;
}


/* *******************************
message-area
******************************** */

.message-area {
  height: 100vh;
  overflow: hidden;
}

.chat-area {
  position: relative;
  width: 100%;
  background-color: #fff;
  border-radius: 0.3rem;
  height: 90vh;
  overflow: hidden;
  min-height: calc(100% - 1rem);
}

.chatlist {
  outline: 0;
  height: 100%;
  overflow: hidden;
  width: 300px;
  float: left;
}

.chat-area .modal-content {
  border: none;
  border-radius: 0;
  outline: 0;
  height: 100%;
}

.chat-area .modal-dialog-scrollable {
  height: 100% !important;
}

.chatbox {
  width: auto;
  overflow: hidden;
  height: 600px;
  border-left: 1px solid #ccc;
}

.chatbox .modal-dialog,
.chatlist .modal-dialog {
  max-width: 100%;
  margin: 0;
}

.msg-search {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.chat-area .form-control {
  display: block;
  width: 80%;
  padding: 0.375rem 0.75rem;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.5;
  color: #222;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ccc;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.chat-area .form-control:focus {
  outline: 0;
  box-shadow: inherit;
}

a.add img {
  height: 36px;
}

.chat-area .nav-tabs {
  border-bottom: 1px solid #dee2e6;
  align-items: center;
  justify-content: space-between;
  flex-wrap: inherit;
}

.chat-area .nav-tabs .nav-item {
  width: 100%;
}

.chat-area .nav-tabs .nav-link {
  width: 100%;
  color: #180660;
  font-size: 14px;
  font-weight: 500;
  line-height: 1.5;
  text-transform: capitalize;
  margin-top: 5px;
  margin-bottom: -1px;
  background: 0 0;
  border: 1px solid transparent;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.chat-area .nav-tabs .nav-item.show .nav-link,
.chat-area .nav-tabs .nav-link.active {
  color: #222;
  background-color: #fff;
  border-color: transparent transparent #000;
}

.chat-area .nav-tabs .nav-link:focus,
.chat-area .nav-tabs .nav-link:hover {
  border-color: transparent transparent #000;
  isolation: isolate;
}

.chat-list h3 {
  color: #222;
  font-size: 16px;
  font-weight: 500;
  line-height: 1.5;
  text-transform: capitalize;
  margin-bottom: 0;
}

.chat-list p {
  color: #343434;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.5;
  text-transform: capitalize;
  margin-bottom: 0;
}

.chat-list a.d-flex {
  margin-bottom: 15px;
  position: relative;
  text-decoration: none;
}

.chat-list .active {
  display: block;
  content: '';
  clear: both;
  position: absolute;
  bottom: 3px;
  left: 34px;
  height: 12px;
  width: 12px;
  background: #00DB75;
  border-radius: 50%;
  border: 2px solid #fff;
}

.msg-head h3 {
  color: #222;
  font-size: 18px;
  font-weight: 600;
  line-height: 1.5;
  margin-bottom: 0;
}

.msg-head p {
  color: #343434;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.5;
  text-transform: capitalize;
  margin-bottom: 0;
}

.msg-head {
  padding: 15px;
  border-bottom: 1px solid #ccc;
}

.moreoption {
  display: flex;
  align-items: center;
  justify-content: end;
}

.moreoption .navbar {
  padding: 0;
}

.moreoption li .nav-link {
  color: #222;
  font-size: 16px;
}

.moreoption .dropdown-toggle::after {
  display: none;
}

.moreoption .dropdown-menu[data-bs-popper] {
  top: 100%;
  left: auto;
  right: 0;
  margin-top: 0.125rem;
}

.msg-body ul {
  overflow: hidden;
}

.msg-body ul li {
  list-style: none;
  margin: 15px 0;
}

.msg-body ul li.sender {
  display: block;
  width: 100%;
  position: relative;
}

.msg-body ul li.sender:before {
  display: block;
  clear: both;
  content: '';
  position: absolute;
  top: -6px;
  left: -7px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 12px 15px 12px;
  border-color: transparent transparent #f5f5f5 transparent;
  -webkit-transform: rotate(-37deg);
  -ms-transform: rotate(-37deg);
  transform: rotate(-37deg);
}

.msg-body ul li.sender p {
  color: #000;
  font-size: 14px;
  line-height: 1.5;
  font-weight: 400;
  padding: 15px;
  background: #f5f5f5;
  display: inline-block;
  border-bottom-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  margin-bottom: 0;
}

.msg-body ul li.sender p b {
  display: block;
  color: #180660;
  font-size: 14px;
  line-height: 1.5;
  font-weight: 500;
}

.msg-body ul li.repaly {
  display: block;
  width: 100%;
  text-align: right;
  position: relative;
}

.msg-body ul li.repaly:before {
  display: block;
  clear: both;
  content: '';
  position: absolute;
  bottom: 15px;
  right: -7px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 12px 15px 12px;
  border-color: transparent transparent #4b7bec transparent;
  -webkit-transform: rotate(37deg);
  -ms-transform: rotate(37deg);
  transform: rotate(37deg);
}

.msg-body ul li.repaly p {
  color: #fff;
  font-size: 14px;
  line-height: 1.5;
  font-weight: 400;
  padding: 15px;
  background: #4b7bec;
  display: inline-block;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-left-radius: 10px;
  margin-bottom: 0;
}

.msg-body ul li.repaly p b {
  display: block;
  color: #061061;
  font-size: 14px;
  line-height: 1.5;
  font-weight: 500;
}

.msg-body ul li.repaly:after {
  display: block;
  content: '';
  clear: both;
}

.time {
  display: block;
  color: #000;
  font-size: 12px;
  line-height: 1.5;
  font-weight: 400;
}

li.repaly .time {
  margin-right: 20px;
}

.divider {
  position: relative;
  z-index: 1;
  text-align: center;
}

.msg-body h6 {
  text-align: center;
  font-weight: normal;
  font-size: 14px;
  line-height: 1.5;
  color: #222;
  background: #fff;
  display: inline-block;
  padding: 0 5px;
  margin-bottom: 0;
}

.divider:after {
  display: block;
  content: '';
  clear: both;
  position: absolute;
  top: 12px;
  left: 0;
  border-top: 1px solid #EBEBEB;
  width: 100%;
  height: 100%;
  z-index: -1;
}

.send-box {
  padding: 15px;
  border-top: 1px solid #ccc;
}

.send-box form {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 15px;
}

.send-box .form-control {
  display: block;
  width: 85%;
  padding: 0.375rem 0.75rem;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.5;
  color: #222;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ccc;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.send-box button {
  border: none;
  background: #3867d6;
  padding: 0.375rem 5px;
  color: #fff;
  border-radius: 0.25rem;
  font-size: 14px;
  font-weight: 400;
  width: 24%;
  margin-left: 1%;
}

.send-box button i {
  margin-right: 5px;
}

.send-btns .button-wrapper {
  position: relative;
  width: 125px;
  height: auto;
  text-align: left;
  margin: 0 auto;
  display: block;
  background: #F6F7FA;
  border-radius: 3px;
  padding: 5px 15px;
  float: left;
  margin-right: 5px;
  margin-bottom: 5px;
  overflow: hidden;
}

.send-btns .button-wrapper span.label {
  position: relative;
  z-index: 1;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  width: 100%;
  cursor: pointer;
  color: #343945;
  font-weight: 400;
  text-transform: capitalize;
  font-size: 13px;
}

#upload {
  display: inline-block;
  position: absolute;
  z-index: 1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}

.send-btns .attach .form-control {
  display: inline-block;
  width: 120px;
  height: auto;
  padding: 5px 8px;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.5;
  color: #343945;
  background-color: #F6F7FA;
  background-clip: padding-box;
  border: 1px solid #F6F7FA;
  border-radius: 3px;
  margin-bottom: 5px;
}

.send-btns .button-wrapper span.label img {
  margin-right: 5px;
}

.button-wrapper {
  position: relative;
  width: 100px;
  height: 100px;
  text-align: center;
  margin: 0 auto;
}

button:focus {
  outline: 0;
}

.add-apoint {
  display: inline-block;
  margin-left: 5px;
}

.add-apoint a {
  text-decoration: none;
  background: #F6F7FA;
  border-radius: 8px;
  padding: 8px 8px;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.2;
  color: #343945;
}

.add-apoint a svg {
  margin-right: 5px;
}

.chat-icon {
  display: none;
}

.closess i {
  display: none;
}



@media (max-width: 767px) {
  .chat-icon {
      display: block;
      margin-right: 5px;
  }
  .chatlist {
      width: 100%;
  }
  .chatbox {
      width: 100%;
      position: absolute;
      left: 1000px;
      right: 0;
      background: #fff;
      transition: all 0.5s ease;
      border-left: none;
  }
  .showbox {
      left: 0 !important;
      transition: all 0.5s ease;
  }
  .msg-head h3 {
      font-size: 14px;
  }
  .msg-head p {
      font-size: 12px;
  }
  .msg-head .flex-shrink-0 img {
      height: 30px;
  }
  .send-box button {
      width: 28%;
  }
  .send-box .form-control {
      width: 70%;
  }
  .chat-list h3 {
      font-size: 14px;
  }
  .chat-list p {
      font-size: 12px;
  }
  .msg-body ul li.sender p {
      font-size: 13px;
      padding: 8px;
      border-bottom-left-radius: 6px;
      border-top-right-radius: 6px;
      border-bottom-right-radius: 6px;
  }
  .msg-body ul li.repaly p {
      font-size: 13px;
      padding: 8px;
      border-top-left-radius: 6px;
      border-top-right-radius: 6px;
      border-bottom-left-radius: 6px;
  }
}
</style>

  <!-- char-area -->
  <section class="message-area">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="chat-area">
                      <!-- chatlist -->
                      <div class="chatlist">
                          <div class="modal-dialog-scrollable">
                              <div class="modal-content">
                                  <div class="chat-header">
                                      <div class="msg-search">
                                          <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" aria-label="search">
                                          <a class="add" href="#"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/add.svg" alt="add"></a>
                                      </div>

                                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item" role="presentation">
                                              <button class="nav-link active" id="Open-tab" data-bs-toggle="tab" data-bs-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Open</button>
                                          </li>
                                          <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="Closed-tab" data-bs-toggle="tab" data-bs-target="#Closed" type="button" role="tab" aria-controls="Closed" aria-selected="false">Closed</button>
                                          </li>
                                      </ul>
                                  </div>

                                  <div class="modal-body">
                                      <!-- chat-list -->
                                      <div class="chat-lists">
                                          <div class="tab-content" id="myTabContent">
                                              <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                  <!-- chat-list -->
                                                  <div class="chat-list">
                                                    @foreach($user as $key => $users)
                                                     
                                                      <a href="/help/{{$users->id}}" class="d-flex align-items-center">
                                                        <div class="avatar ">
                                                          <img src="/hospital_logo/{{$users->image}}" alt="" class="w-px-40 h-auto rounded-circle"></div>
                                                          <div class="flex-grow-1 ms-3">
                                                              <h3>{{$users->name}}</h3>
                                                              <p>{{$users->host_name}}</p>
                                                          </div>
                                                      </a>
                                             
                                                      @endforeach
                                                      
                                                  </div>
                                                  <!-- chat-list -->
                                              </div>
                                              <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="Closed-tab">

                                                  <!-- chat-list -->
                                                  <div class="chat-list">
                                                    @foreach($user as $key => $users)
                                                  
                                                    <a href="#" class="d-flex align-items-center">
                                                      <div class="avatar ">
                                                        <img src="/hospital_logo/{{$users->image}}" alt="" class="w-px-40 h-auto rounded-circle"></div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h3>{{$users->name}}</h3>
                                                            <p>{{$users->host_name}}</p>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                     

                                                  </div>
                                                  <!-- chat-list -->
                                              </div>
                                          </div>

                                      </div>
                                      <!-- chat-list -->
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- chatlist -->



                      <!-- chatbox -->
                      <div class="chatbox">
                          <div class="modal-dialog-scrollable">
                              <div class="modal-content">
                                  <div class="msg-head">
                                      <div class="row">
                                          <div class="col-8">
                                              <div class="d-flex align-items-center">
                                                  <span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
                                                  @if(isset($chatperson))
                                                  <div class="avatar ">
                                                    <img src="/hospital_logo/{{$chatperson[0]['image']}}" alt="" class="w-px-40 h-auto rounded-circle"></div>
                                                  <div class="flex-grow-1 ms-3">
                                               
                                                      <h3>{{$chatperson[0]['name']}}</h3>
                                                      <p>{{$chatperson[0]['host_name']}}</p>
                                                     
                                                  </div>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="col-4">
                                              <ul class="moreoption">
                                                  <li class="navbar nav-item dropdown">
                                                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                      <ul class="dropdown-menu">
                                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                                          <li>
                                                              <hr class="dropdown-divider">
                                                          </li>
                                                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>


                                  <div class="modal-body">
                                      <div class="msg-body">
                                          <ul>
                                            @php
                                            $i=0;
                                            @endphp
                                 @if(isset($chat))
                                            @foreach($chat as $key => $chats)
                                            
                                            @if ($chats->created_at->toDateString() == now()->toDateString())
                                           
                                                  @if($i == 0)
                                                      <li>
                                                        <div class="divider">
                                                            <h6>Today</h6>
                                                        </div>
                                                    </li>
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    @endif
                                                  
                                                      <li @if ($chats->sender_id == auth()->user()->id) class="repaly" @else class="sender" @endif >
                                                        <p> {{$chats->message}} </p>
                                                        <span class="time">{{$chats->created_at->format('h:i:s')}}</span>
                                                      </li>
                                                  

                                            @else
                                            
                                              <li @if ($chats->sender_id == auth()->user()->id) class="repaly" @else class="sender" @endif >
                                                  <p> {{$chats->message}} </p>
                                                  <span class="time">{{$chats->created_at->format('h:i:s')}}</span>
                                              </li>
                                           
                                              @endif

                                     
                                           

                                              @endforeach

                                              <span class="messagechat">
                                              </span>

                                      @endif  
                                      <span class="focus">
                                      </span>

                                          </ul>
                                      </div>
                                  </div>


                                  <div class="send-box">
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('add_help') }}" >
                                      @csrf
                                          <input type="text" class="form-control" aria-label="message…" name="message" placeholder="Write message…">

                                          <input type="hidden" class="form-control" aria-label="message…"name="sender_id" value="{{auth()->user()->id}}" >

                                          <input type="hidden" class="form-control" aria-label="message…"name="reciever_id" value="@if(isset($get_id)){{$get_id}}@endif" >

                                          <input type="hidden" class="form-control total_message" aria-label="message…"name="total_message"  >

                                          <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                                      </form>

                                      {{-- <div class="send-btns">
                                          <div class="attach">
                                              <div class="button-wrapper">
                                                  <span class="label">
                                                      <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/upload.svg" alt="image title"> attached file 
                                                  </span><input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File">
                                              </div>

                                              <select class="form-control" id="exampleFormControlSelect1">
                                                  <option>Select template</option>
                                                  <option>Template 1</option>
                                                  <option>Template 2</option>
                                              </select>

                                              <div class="add-apoint">
                                                  <a href="#" data-toggle="modal" data-target="#exampleModal4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none"><path d="M8 16C3.58862 16 0 12.4114 0 8C0 3.58862 3.58862 0 8 0C12.4114 0 16 3.58862 16 8C16 12.4114 12.4114 16 8 16ZM8 1C4.14001 1 1 4.14001 1 8C1 11.86 4.14001 15 8 15C11.86 15 15 11.86 15 8C15 4.14001 11.86 1 8 1Z" fill="#7D7D7D"/><path d="M11.5 8.5H4.5C4.224 8.5 4 8.276 4 8C4 7.724 4.224 7.5 4.5 7.5H11.5C11.776 7.5 12 7.724 12 8C12 8.276 11.776 8.5 11.5 8.5Z" fill="#7D7D7D"/><path d="M8 12C7.724 12 7.5 11.776 7.5 11.5V4.5C7.5 4.224 7.724 4 8 4C8.276 4 8.5 4.224 8.5 4.5V11.5C8.5 11.776 8.276 12 8 12Z" fill="#7D7D7D"/></svg> Appoinment</a>
                                              </div>
                                          </div>
                                      </div> --}}

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- chatbox -->


              </div>
          </div>
      </div>
      </div>
  </section>
  <!-- char-area -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  jQuery(document).ready(function() {

// $(".chat-list a").click(function() {
//   $(".chatbox").addClass('showbox');
//   return false;
// });

$(".chat-icon").click(function() {
  $(".chatbox").removeClass('showbox');
});


});
</script>

<script>

// Function to reload data without refreshing the page
function firstreloadData() {
      $.ajax({
        url: '/reload-data?sender_id={{auth()->user()->id}}&reciever_id=@if(isset($get_id)){{$get_id}}@endif',
          type: 'GET',
          dataType: 'json',
          success: function (data) {
              // Update your page with the new data
             // console.log(data.chat.length); // For demonstration purposes

             console.log('firstreload',data.chat.length);
             console.log(data.chat[data.chat.length - 1].created_at);
              $('.total_message').val(data.chat.length);

          },
          error: function (error) {
              console.error('Error loading data:', error);
          }
      });
  }



  function scrollToBottom() {
// Get the .focus element
var focusElement = document.querySelector('.focus');

// Scroll the .focus element into view
if (focusElement) {
    focusElement.scrollIntoView({ behavior: 'smooth', block: 'center', inline: 'center' });
}



// var containerxxl = document.querySelector('.chat-area');

// // Scroll the .focus element into view
// if (containerxxl) {
//   containerxxl.scrollIntoView({ behavior: 'smooth', block: 'center', inline: 'center' });
// }
}

// Execute the function after 3 seconds
setTimeout(function() {
// Get the .chat-area element
var chatArea = document.querySelector('.layout-navbar');

// Focus on the .chat-area element and scroll it into view
if (chatArea) {
    chatArea.focus();
    chatArea.scrollIntoView({ behavior: 'smooth', block: 'center', inline: 'center' });
}
}, 1000);

  // Function to reload data without refreshing the page
  function reloadData() {
      $.ajax({
          url: '/reload-data?sender_id={{auth()->user()->id}}&reciever_id=@if(isset($get_id)){{$get_id}}@endif',
          type: 'GET',
          dataType: 'json',
          success: function (data) {

            console.log(data);

            console.log('reload');

            var total_message = $('.total_message').val();

            console.log('totalmessage',total_message);

            console.log('datalength',data.chat.length);

            console.log('before running');
            console.log('before',total_message);
            console.log('before',data.chat.length);
            if(total_message < data.chat.length)
            {
              console.log('running');
              $('.total_message').val(data.chat.length);
                  // $('.total_message').val(data.chat.length);
                // Update your page with the new data
                console.log(data.chat[0].id); // For demonstration purposes
                              console.log(data.chat[data.chat.length - 1].message);

                                  // Get the datetime string from the AJAX response
                                  var datetimeString = data.chat[data.chat.length - 1].created_at;

                                  // Parse the datetime string into a JavaScript Date object
                                  var datetime = new Date(datetimeString);

                                  // Get the time component in HH:mm:ss format
                                  var formattedTime = datetime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true });


                                  // Loop through the JSON array and build HTML dynamically
            
                    var chatClass = data.chat[data.chat.length - 1].sender_id == {{ auth()->user()->id }} ? 'repaly' : 'sender';
                   var updatedHtml = '<li class="' + chatClass + '">' +
                        '<p>' + data.chat[data.chat.length - 1].message + '</p>' +
                        '<span class="time">' + formattedTime + '</span>' +
                        '</li>';


                // Update the content of the HTML element with id 'chat-list'
                $('.messagechat').append(updatedHtml);

                scrollToBottom();


                // Execute the function after 3 seconds
setTimeout(function() {
// Get the .chat-area element
var chatArea = document.querySelector('.layout-navbar');

// Focus on the .chat-area element and scroll it into view
if (chatArea) {
    chatArea.focus();
    chatArea.scrollIntoView({ behavior: 'smooth', block: 'center', inline: 'center' });
}
}, 1000);

            }


             



              // var updatedHtml = '<a href="/help/' + data.id + '" class="d-flex align-items-center">' +
              //       '<div class="avatar"><img src="/hospital_logo/' + data.image + '" alt="" class="w-px-40 h-auto rounded-circle"></div>' +
              //       '<div class="flex-grow-1 ms-3">' +
              //       '<h3>' + data.name + '</h3>' +
              //       '<p>' + data.host_name + '</p>' +
              //       '</div>' +
              //       '</a>';

              //       $('#user-info').html(messagechat);


              // // Loop through the JSON array and build HTML dynamically
              // var updatedHtml = '';
              //   for (var i = 0; i < data.length; i++) {
              //       updatedHtml += '<a href="/help/' + data[i].id + '" class="d-flex align-items-center">' +
              //           '<div class="avatar"><img src="/hospital_logo/' + data[i].image + '" alt="" class="w-px-40 h-auto rounded-circle"></div>' +
              //           '<div class="flex-grow-1 ms-3">' +
              //           '<h3>' + data[i].name + '</h3>' +
              //           '<p>' + data[i].host_name + '</p>' +
              //           '</div>' +
              //           '</a>';
              //   }

              //   // Update the content of the HTML element with id 'user-list'
              //   $('#user-list').html(messagechat);

              // You can update specific parts of your page using JavaScript
              // For example, if you have a <div id="updated-data"></div> on your page
              // $('#updated-data').html('Updated Data: ' + data);

              // Alternatively, you can trigger a full page refresh
              // location.reload();
          },
          error: function (error) {
              console.error('Error loading data:', error);
          }
      });
  }

  //Call the reloadData function on page load or as needed
  $(document).ready(function () {
    scrollToBottom();
    
    console.log('check');
    firstreloadData();
    setInterval(function () {
      
        reloadData();
        console.log('refresh');
    }, 5000); // 60,000 milliseconds = 1 minute

    
  });
</script>

@endsection

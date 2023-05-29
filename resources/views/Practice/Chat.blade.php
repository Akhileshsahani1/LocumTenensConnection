@include('Practice.header')
<!--Main layout-->
<main class="main-body">
   <div class="container-fluid chat-panel px-5 mob-p-0">
      <div class="heading ps-5 pe-5 me-xxl-5 ">
         <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
            <h3 class="font-20 fw-bold">Chat with Provider</h3>
         </div>
      </div>
      <div class="row px-5 pt-3 me-xxl-5 ">
         <div class="col-lg-3 col-12">
            <div class="row">
               <div class="col-lg-12">
                  <form action="#" class="bg-white">
                     <div class="input-group border">
                        <div class="input-group-text border-0 pt-4">
                           <div class="icon icon-lg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                 <circle cx="11" cy="11" r="8"></circle>
                                 <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                              </svg>
                           </div>
                        </div>
                        <input type="text" class="form-control font-12 ps-0" placeholder="Search..." style="height: 60px!important;"id="search_people" onkeyup="search_user(' {{ Auth::user()->userId }} ', this.value);" >
                     </div>
                  </form>
               </div>
               <div class="card-list">
               <div class="hide-scrollbar" id="search_people_area"></div>
                  
               </div>
            </div>
         </div>
         <div class="col-lg-9 col-12 p-0 bg-white" id="chat_area">
            
         </div>
      </div>
   </div>
</main>


<script>
var conn = new WebSocket('ws://127.0.0.1:8090/?token={{ auth()->user()->userId}}');

var from_user_id = "{{ Auth::user()->userId }}";
// var user_type = "{{ Auth::user()->userId }}";

var to_user_id = "";

var user_id="";



conn.onopen = function(e){

	console.log("Connection ok!");

	load_unconnected_user(from_user_id);

	load_unread_notification(from_user_id);

	load_connected_chat_user(from_user_id);
	

};

 var online ;
 

conn.onmessage = function(e){
	
	var data = JSON.parse(e.data);
	
	


	// if(data?.count_unread_message)
	// {
	// 	console.log(data?.count_unread_message);
	// 	    count_unread_sms(data?.count_unread_message)
	// }

	if(data?.userTyping)
	{
		//  showTyping(data?.count);
	
		 if(data?.userTyping?.count.length>0){
			console.log(data?.userTyping);
			document.getElementById('typingId').innerHTML = "typing....";
           
		 }else{
			document.getElementById('typingId').innerHTML = "";
            
		 }
		
	}
	if(data?.chat_history){
		
		// // console.log(data?.chat_history,"LLLLLLLLLLLLLLLLLLLLLLLLLLLL");
	    // let d =  data.chat_history?.filter(v=>v.message_status != "Read")
		// let messageCount = d?.length;
		// console.log(d);
		chathistory(data?.chat_history)
		 
	}

	if(data.image_link)
	{
		//Display Code for uploaded Image

		document.getElementById('message_area').innerHTML = `<img src="{{ asset('images/`+data.image_link+`') }}" class="img-thumbnail img-fluid" />`;
	}

	if(data.status)
	{
		var online_status_icon = document.getElementsByClassName('online_status_icon');

		for(var count = 0; count < online_status_icon.length; count++)
		{
			if(online_status_icon[count].userId == 'status_'+data.userId)
			{
				if(data.status == 'Online')
				{
					online_status_icon[count].classList.add('text-success');

					online_status_icon[count].classList.remove('text-danger');

					document.getElementById('last_seen_'+data.id+'').innerHTML = 'Online';
				}
				else
				{
					online_status_icon[count].classList.add('text-danger');

					online_status_icon[count].classList.remove('text-success');

					document.getElementById('last_seen_'+data.id+'').innerHTML = data.last_seen;
				}
			}
		}
	}

	if(data.response_load_unconnected_user || data.response_search_user)
	{
		var html = '';

		if(data.data.length > 0)
		{
			console.log(data,"sdfsdfd")
			html += '<ul class="list-group">';

			for(var count = 0; count < data.data.length; count++)
			{   
				
				var user_image = '';

				if(data.data[count].user_image != '')
				{
					// user_image = `<img src="{{ asset('images/') }}/`+data.data[count].user_image+`" width="40" class="rounded-circle" />`;
					user_image = `<img alt="..." src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" class="rounded-circle" style="height: 100%; width: 100%; object-fit: cover">`

				}
				else
				{
					// user_image = `<img alt="..." src="{{ asset('images/no-image.jpg') }}" class="rounded-circle" style="height: 100%; width: 100%; object-fit: cover"/>`
					user_image = `<img alt="..." src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" class="rounded-circle" style="height: 100%; width: 100%; object-fit: cover">`

				}
			    
				
			 
            
				 if(data?.data[count]?.status=="Online"){
					 html += `
                <div class="gap-4 chat-row  border-bottom bg-white" id="chat" onclick="make_chat_area( '${data?.data[count]?.userId}','${data?.data[count]?.name}','${data?.data[count]?.status}')">
                     <!-- Card -->
                     <div class="card border-0 text-reset">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-auto">
                                 <div class="avatar avatar-online">
                                    <img src="{{asset('Assets/images/logo.svg')}}" alt="#" class="avatar-img">
                                 </div>
                              </div>
                              <div class="col">
                                 <div class="d-flex align-items-center mb-1">
                                    <h5 class="me-auto mb-0">${data?.data[count]?.name} </h5>
                                    <span class="text-muted extra-small ms-2"></span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <div class="line-clamp me-auto">
                                       Hello! Yeah, I'm going to meet my friend of mine at the departments stores now.
                                    </div>
                                    <div class="badge badge-circle bg-primary ms-5">
                                       <span>3</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- .card-body -->
                      </div>
                  </div>
					 `;

				 }else{
					 html += `
                <div class="gap-4 chat-row  border-bottom bg-white" id="chat" onclick="make_chat_area('${data?.data[count]?.userId}','${data?.data[count]?.name}')">
                     <!-- Card -->
                     <div class="card border-0 text-reset">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-auto">
                                 <div class="avatar">
                                    <img src="{{asset('Assets/images/logo.svg')}}" alt="#" class="avatar-img">
                                 </div>
                              </div>
                              <div class="col">
                                 <div class="d-flex align-items-center mb-1">
                                    <h5 class="me-auto mb-0"> ${data?.data[count]?.name}</h5>
                                    <span class="text-muted extra-small ms-2">${data?.data[count]?.last_seen}</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <div class="line-clamp me-auto">
                                       Hello! Yeah, I'm going to meet my friend of mine at the departments stores now.
                                    </div>
                                    <div class="badge badge-circle bg-primary ms-5">
                                       <span>3</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- .card-body -->
                      </div>
                  </div>
					 `;
				 }

			}

			html += '</ul>';
		}
		else
		{
			html = 'No User Found';
		}

		document.getElementById('search_people_area').innerHTML = html;
		getonline(data?.data[count]?.status)
	}


	if(data.response_from_user_chat_request)
	{
		search_user(from_user_id, document.getElementById('search_people').value);

		load_unread_notification(from_user_id);
	}

	if(data.response_to_user_chat_request)
	{
		load_unread_notification(data.user_id);
	}

	if(data.response_load_notification)
	{
		var html = '';

		for(var count = 0; count < data.data.length; count++)
		{
			var user_image = '';

			if(data.data[count].user_image != '')
			{
				user_image = `<img src="{{ asset('images/') }}/`+data.data[count].user_image+`" width="40" class="rounded-circle" />`;
			}
			else
			{
				user_image = `<img src="{{ asset('images/no-image.jpg') }}" width="40" class="rounded-circle" />`;
			}

			html += `
			<li class="list-group-item">
				<div class="row">
					<div class="col col-8">`+user_image+`&nbsp;`+data.data[count].name+`</div>
					<div class="col col-4">
			`;
			if(data.data[count].notification_type == 'Send Request')
			{
				if(data.data[count].status == 'Pending')
				{
					html += '<button type="button" name="send_request" class="btn btn-warning btn-sm float-end">Request Send</button>';
				}
				else
				{
					html += '<button type="button" name="send_request" class="btn btn-danger btn-sm float-end">Request Rejected</button>';
				}
			}
			else
			{
				if(data.data[count].status == 'Pending')
				{
					html += '<button type="button" class="btn btn-danger btn-sm float-end" onclick="process_chat_request('+data.data[count].id+', '+data.data[count].from_user_id+', '+data.data[count].to_user_id+', `Reject`)"><i class="fas fa-times"></i></button>&nbsp;';
					html += '<button type="button" class="btn btn-success btn-sm float-end" onclick="process_chat_request('+data.data[count].id+', '+data.data[count].from_user_id+', '+data.data[count].to_user_id+', `Approve`)"><i class="fas fa-check"></i></button>';
				}
				else
				{
					html += '<button type="button" name="send_request" class="btn btn-danger btn-sm float-end">Request Rejected</button>';
				}
			}

			html += `
					</div>
				</div>
			</li>
			`;
		}

		document.getElementById('notification_area').innerHTML = html;
	}

	if(data.response_process_chat_request)
	{
		load_unread_notification(data.user_id);

		load_connected_chat_user(data.user_id);
	}

	if(data.response_connected_chat_user)
	{
		var html = '<div class="list-group">';

		if(data.data.length > 0)
		{
			for(var count = 0; count < data.data.length; count++)
			{
				html += `
				<a href="#" class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
				`;

				var last_seen = '';

				if(data.data[count].user_status == 'Online')
				{
					html += '<span class="text-success online_status_icon" id="status_'+data.data[count].userId+'"><i class="fas fa-circle"></i></span>';

					last_seen = 'Online';
					
				}
				else
				{
					html += '<span class="text-danger online_status_icon" id="status_'+data.data[count].userId+'"><i class="fas fa-circle"></i></span>';

					last_seen = data.data[count].last_seen;
				}

				var user_image = '';

				if(data.data[count].user_image != '')
				{
					user_image = `<img src="{{ asset('images/') }}/`+data.data[count].user_image+`" width="35" class="rounded-circle" />`;
				}
				else
				{
					user_image = `<img src="{{ asset('images/no-image.jpg') }}" width="35" class="rounded-circle" />`;
				}



				html += `
						&nbsp; `+user_image+`&nbsp;<b>`+data.data[count].name+`</b>
						<div class="text-right"><small class="text-muted last_seen" id="last_seen_`+data.data[count].userId+`">`+last_seen+`</small></div>
					</div>
					<span class="user_unread_message" data-id="`+data.data[count].userId+`" id="user_unread_message_`+data.data[count].userId+`"></span>
				</a>
				`;
			}
		}
		else
		{
			html += 'No User Found';
		}

		html += '</div>';

		document.getElementById('user_list').innerHTML = html;

		check_unread_message();
	}

	if(data.message)
	{
		
		 
		var html = '';

		if(data.trim(from_user_id," ") == trim(from_user_id," "))
		{

			var icon_style = '';

			if(data.message_status == 'Not Send')
			{
				icon_style = '<span id="chat_status_'+data.chat_message_id+'" class="float-end"><i class="fas fa-check text-muted"></i></span>';
			}
			if(data.message_status == 'Send')
			{
				icon_style = '<span id="chat_status_'+data.chat_message_id+'" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
			}

			if(data.message_status == 'Read')
			{
				icon_style = '<span class="text-primary float-end" id="chat_status_'+data.chat_message_id+'"><i class="fas fa-check-double"></i></span>';
			}

			html += `
			<div class="row">
				<div class="col col-3">&nbsp;</div>
				<div class="col col-9 alert alert-success text-dark shadow-sm">
					`+data.message+ icon_style +`
				</div>
			</div>
			`;
		}
		else
		{
			if(to_user_id != '')
			{
				html += `
				<div class="row">
					<div class="col col-9 alert alert-light text-dark shadow-sm">
					`+data.message+`
					</div>
				</div>
				`;

				update_message_status(data.chat_message_id, from_user_id, to_user_id, 'Read');
			}
			else
			{
				var count_unread_message_element = document.getElementById('user_unread_message_'+data.from_user_id+'');
            	if(count_unread_message_element)
            	{
	            	var count_unread_message = count_unread_message_element.textContent;
	            	if(count_unread_message == '')
	            	{
	            		count_unread_message = parseInt(0) + 1;
	            	}
	            	else
	            	{
	            		count_unread_message = parseInt(count_unread_message) + 1;
	            	}
	            	count_unread_message_element.innerHTML = '<span class="badge bg-primary rounded-pill">'+count_unread_message+'</span>';

	            	update_message_status(data.chat_message_id, data.from_user_id, data.to_user_id, 'Send');
	            }
			}

		}

		if(html != '')
		{
			var previous_chat_element = document.querySelector('#chat_history');

			var chat_history_element = document.querySelector('#chat_history');

			chat_history_element.innerHTML = previous_chat_element.innerHTML + html;
			scroll_top();
		}

	}

	if(data.chat_history)
	{
		var html = '';

		for(var count = 0; count < data.chat_history.length; count++)
		{
			if(data.chat_history[count].from_user_id == from_user_id)
			{
				var icon_style = '';

				if(data.chat_history[count].message_status == 'Not Send')
				{
					icon_style = '<span id="chat_status_'+data.chat_history[count].id+'" class="float-end"><i class="fas fa-check text-muted"></i></span>';
				}

				if(data.chat_history[count].message_status == 'Send')
				{
					icon_style = '<span id="chat_status_'+data.chat_history[count].id+'" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
				}

				if(data.chat_history[count].message_status == 'Read')
				{
					icon_style = '<span class="text-primary float-end" id="chat_status_'+data.chat_history[count].id+'"><i class="fas fa-check-double"></i></span>';
				}

				html +=`
				<div class="row">
					<div class="col col-3">&nbsp;</div>
					<div class="col col-9 alert alert-success text-dark shadow-sm">
					`+data.chat_history[count].chat_message+ icon_style + `
					</div>
				</div>
				`;


			}
			else
			{
				if(data.chat_history[count].message_status != 'Read')
				{
					update_message_status(data.chat_history[count].id, data.chat_history[count].from_user_id, data.chat_history[count].to_user_id, 'Read');
				}

				html += `
				<div class="row">
					<div class="col col-9 alert alert-light text-dark shadow-sm">
					`+data.chat_history[count].chat_message+`
					</div>
				</div>
				`;

				var count_unread_message_element = document.getElementById('user_unread_message_'+data.chat_history[count].from_user_id+'');

                if(count_unread_message_element)
                {
                	count_unread_message_element.innerHTML = '';
                }
			}
		}

		document.querySelector('#chat_history').innerHTML = html;

		scroll_top();
	}

	if(data.update_message_status)
	{
		var chat_status_element = document.querySelector('#chat_status_'+data.chat_message_id+'');

		if(chat_status_element)
		{
			if(data.update_message_status == 'Read')
			{
				chat_status_element.innerHTML = '<i class="fas fa-check-double text-primary"></i>';
			}
			if(data.update_message_status == 'Send')
			{
				chat_status_element.innerHTML = '<i class="fas fa-check-double text-muted"></i>';
			}
		}

		if(data.unread_msg)
		{
			var count_unread_message_element = document.getElementById('user_unread_message_'+data.from_user_id+'');

			if(count_unread_message_element)
			{
				var count_unread_message = count_unread_message_element.textContent;

				if(count_unread_message == '')
				{
					count_unread_message = parseInt(0) + 1;
				}
				else
				{
					count_unread_message = parseInt(count_unread_message) + 1;
				}

				count_unread_message_element.innerHTML = '<span class="badge bg-danger rounded-pill">'+count_unread_message+'</span>';
			}
		}
	}
};

function scroll_top()
{
    document.querySelector('#chat_history').scrollTop = document.querySelector('#chat_history').scrollHeight;
}

function load_unconnected_user(from_user_id)
{
	var data = {
		from_user_id : from_user_id,
		type : 'request_load_unconnected_user'
	};

	conn.send(JSON.stringify(data));
}

function search_user(from_user_id,search_query)
{
	if(search_query.length > 0)
	{
		
		var data = {
			from_user_id : from_user_id,
			search_query : search_query,
			type : 'request_search_user'
		};
		
            
		conn.send(JSON.stringify(data));
	}
	else
	{
		load_unconnected_user(from_user_id);
	}
}

function send_request(element, from_user_id, to_user_id)
{
	var data = {
		from_user_id : from_user_id,
		to_user_id : to_user_id,
		type : 'request_chat_user'
	};

	element.disabled = true;

	conn.send(JSON.stringify(data));
}

function load_unread_notification(user_id)
{
    
	var data = {
		user_id : user_id,
		type : 'request_load_unread_notification'
	};

	conn.send(JSON.stringify(data));

}

function process_chat_request(chat_request_id, from_user_id, to_user_id, action)
{
	var data = {
		chat_request_id : chat_request_id,
		from_user_id : from_user_id,
		to_user_id : to_user_id,
		action : action,
		type : 'request_process_chat_request'
	};

	conn.send(JSON.stringify(data));
}

function load_connected_chat_user(from_user_id)
{
	var data = {
		from_user_id : from_user_id,
		type : 'request_connected_chat_user'
	};

	conn.send(JSON.stringify(data));
}


function enterKeyPressed(e){
	if (e.keyCode == 13) {
		document.getElementById("submitBtn").click();
      }
}

function make_chat_area(to_user_id,to_user_name,status)
{ 
	user_id=to_user_id;

    load_chat_data(to_user_id);
	
	

	
   if(status=='Online')
   {
	var html = `
			  <div class="h-100">
               <div class="d-flex flex-column h-100 position-relative">
                  <!-- Chat: Header -->
                  <div class="chat-header border-bottom p-3 sky-blue-bg">
                     <div class="row align-items-center">
                        <div class="col-8 col-xl-12">
                           <div class="row align-items-center text-center text-xl-start">
                              <div class="col-12 col-xl-6">
                                 <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                       <div class="avatar avatar-online">
                                          <img class="avatar-img" src="{{asset('Assets/images/logo.svg')}}" alt="">
                                       </div>
                                    </div>
                                    <div class="col overflow-hidden">
                                       <h5 class="mb-0">${to_user_name}</h5>
									   <p class="font-12">${status} </p>
									   <span class="typing" id="typingId"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Chat: Header -->
                  <!-- Chat: Content -->
                  <div class="chat-body hide-scrollbar flex-1 h-100">
                     <div class="chat-body-inner" style="padding-bottom: 87px" id="chatconnetion" >
                         
                     
                  </div>
                  <!-- Chat: Content -->
                  <!-- Chat: Footer -->
                  <div class="chat-footer position-absolute bottom-0 start-0 px-3">
                     <!-- Chat: Files -->
                     <div class="dz-preview bg-dark">
                     </div>
                     <!-- Chat: Files -->
                     <!-- Chat: Form -->
				
                     <div class="chat-form" id="img-upload-form">
                        <div class="row align-items-center gx-0">
                           <div class="col">
                              <div class="input-group">
                                 <textarea onkeypress="enterKeyPressed(event)" onkeyup="userTyping('${to_user_id}');"  id="messagess" class="form-control px-0" placeholder="Type your message..." rows="1" id="messagess" name="message"></textarea>
                              </div>
                           </div>
                           <div class="col-auto pe-3">
                              <button  class="btn btn-icon bg-gray rounded-circle  position-relative">
                                 <label for="upload_imgs"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
                                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                 </svg></label>
                                <input class="show-for-sr" type="file" id="upload_imgs"  name="files[]" multiple aria-hidden="true"/>
                                
                                 
                              </button>
                              <button onclick="send_chat_message('${to_user_id}')" class="btn btn-icon btn-primary rounded-circle ms-3" id="submitBtn" >
                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                 </svg>
                              </button>
                           </div>
                        </div>
                     </div>
				
                     <!-- Chat: Form -->
                  </div>
                  <!-- Chat: Footer -->
               </div>
            </div>`;

					document.getElementById('chat_area').innerHTML = html;

				      
					
					
					

					to_user_id = user_id;

			}else{
					var html = `
					<div class="h-100">
               <div class="d-flex flex-column h-100 position-relative">
                  <!-- Chat: Header -->
                  <div class="chat-header border-bottom p-3 sky-blue-bg">
                     <div class="row align-items-center">
                        <div class="col-8 col-xl-12">
                           <div class="row align-items-center text-center text-xl-start">
                              <div class="col-12 col-xl-6">
                                 <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                       <div class="avatar">
                                          <img class="avatar-img" src="{{asset('Assets/images/logo.svg')}}" alt="">
                                       </div>
                                    </div>
                                    <div class="col overflow-hidden">
                                       <h5 class="mb-0">${to_user_name}</h5>
									   <p class="font-12">Offline</p>
									 
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Chat: Header -->
                  <!-- Chat: Content -->
                  <div class="chat-body hide-scrollbar flex-1 h-100">
                     <div class="chat-body-inner" style="padding-bottom: 87px" id="chatconnetion" >
                         
                     
                  </div>
                  <!-- Chat: Content -->
                  <!-- Chat: Footer -->
                  <div class="chat-footer position-absolute bottom-0 start-0 px-3">
                     <!-- Chat: Files -->
                     <div class="dz-preview bg-dark">
                     </div>
                     <!-- Chat: Files -->
                     <!-- Chat: Form -->
				
                     <div class="chat-form" id="img-upload-form">
                        <div class="row align-items-center gx-0">
                           <div class="col">
                              <div class="input-group">
                                 <textarea onkeypress="enterKeyPressed(event)"   id="messagess" class="form-control px-0" placeholder="Type your message..." rows="1" id="messagess" name="message"></textarea>
                              </div>
                           </div>
                           <div class="col-auto pe-3">
                              <button  class="btn btn-icon bg-gray rounded-circle  position-relative">
                                 <label for="upload_imgs"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
                                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                 </svg></label>
                                <input class="show-for-sr" type="file" id="upload_imgs"  name="files[]" multiple aria-hidden="true"/>
                                
                                 
                              </button>
                              <button onclick="send_chat_message('${to_user_id}')" class="btn btn-icon btn-primary rounded-circle ms-3" id="submitBtn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                 </svg>
                              </button>
                           </div>
                        </div>
                     </div>
				
                     <!-- Chat: Form -->
                  </div>
                  <!-- Chat: Footer -->
               </div>
            </div>`;

					document.getElementById('chat_area').innerHTML = html;

					
                  

					to_user_id = user_id;

         }
	
	
}



// document.getElementById("leftside").childNodes[1];
function chathistory(chatData){

 



	document.getElementById("chatconnetion").innerHTML = chatData.map(e => `


	<div class="py-6 py-lg-12">
		${e?.from_user_id != user_id ? `
			<div id="msgBox" class="message message-out">
				<a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
					<img class="avatar-img" src="{{asset('Assets/images/logo.svg')}}" alt="">
				</a>
				<div class="message-inner">
					<div class="message-body">
						<div class="message-content">
							<div class="message-text">
								<p class="small font-13 text-truncate">${e?.from_user_id != user_id ? e?.chat_message : ""}</p>
								<div class="text-info ms-5">
									${e?.message_status == "Read" ? '<i class="bi bi-check2-all"></i>' : '<i class="bi bi-check"></i>'}
								</div>
							</div>
						</div>
						<div class="message-content">
							${e?.fileName == null ? `` : `
								<div class="row align-items-center gx-4">
									<div class="col-auto">
										<a href="#" class="avatar avatar-sm">
											<div class="avatar-text bg-white text-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
													<line x1="12" y1="5" x2="12" y2="19"></line>
													<polyline points="19 12 12 19 5 12"></polyline>
												</svg>
											</div>
										</a>
									</div>
									<div class="col overflow-hidden">
										<h6 class="font-13 text-reset">
											<a href="#" class="text-reset">filename.json</a>
										</h6>
										<ul class="list-inline text-uppercase extra-small opacity-75 mb-0">
											<li class="list-inline-item">79.2 KB</li>
										</ul>
									</div>
								</div>
							`}
						</div>
					</div>
					<div class="message-footer">
						<span class="extra-small text-muted">08:45 PM</span>
					</div>
				</div>
			</div>
		` : `
			<div class="message">
				<a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
					<img class="avatar-img" src="{{asset('Assets/images/logo.svg')}}" alt="">
				</a>
				<div class="message-inner">
					<div class="message-body">
						<div class="message-content">
							<div class="message-text">
								<p>${e?.from_user_id==user_id?e?.chat_message:" "}</p>
							</div>
						</div>
					</div>
					<div class="message-footer">
						<span class="extra-small text-muted">08:45 PM</span>
					</div>
				</div>
			</div> 
		`}
                          
                           <div class="message-divider">
                              <small class="text-muted">Monday Sep 16</small>
                           </div>
                         
						 </div>
					</div>` ).join(" ")}


function close_chat()
{
	document.getElementById('chat_header').innerHTML = 'Chat Area';

	document.getElementById('close_chat_area').innerHTML = '';

	document.getElementById('chat_area').innerHTML = '';

	to_user_id = '';
}

function send_chat_message(to_user_id)
{
    

	// var message = document.getElementById('message_area').innerHTML.trim();
	var input = document.getElementById("messagess").value;
	
	
	var data = {
		message : input,
		from_user_id : from_user_id,
		to_user_id : to_user_id,
		type : 'request_send_message'
	};
	
	console.log(data,'ddatat');
	conn.send(JSON.stringify(data));
	

     
	document.querySelector('#messagess').value = '';

	document.querySelector('#submitBtn').disabled = false;
  }

function load_chat_data(to_user_id)
{
	var data = {
		from_user_id : from_user_id,
		to_user_id : to_user_id,
		type : 'request_chat_history'
	};

	conn.send(JSON.stringify(data));
}

function update_message_status(chat_message_id, from_user_id, to_user_id, chat_message_status)
{
	var data = {
		chat_message_id : chat_message_id,
		from_user_id : from_user_id,
		to_user_id : to_user_id,
		chat_message_status : chat_message_status,
		type : 'update_chat_status'
	};

	conn.send(JSON.stringify(data));
}

function check_unread_message(to_user_id)
{    
	
	var unread_element = document.getElementsByClassName('user_unread_message');

	for(var count = 0; count < unread_element.length; count++)
	{
		var temp_user_id = unread_element[count].dataset.id;

		var data = {
			
			to_user_id : to_user_id,
			type : 'check_unread_message'
		};

		conn.send(JSON.stringify(data));
	}
}

function userTyping(to_user_id)
{ 
	  
	let tr=document.querySelector('#messagess').value;
	   
		// console.log(tr,"opopopopopopopo")
		
		var data = {
			from_user_id : from_user_id,
			to_user_id : to_user_id,
			type : 'userTyping',
			Count:tr,
		};
		
         
		conn.send(JSON.stringify(data));
	
	
}


// function showTyping(typingdata)
// {
//    console.log(typingdata);

     
// }
function count_Unread_message()
{
	
	var data = {
			from_user_id : from_user_id,
			type :'count_unread_message'
		};
         
		conn.send(JSON.stringify(data));
}

function upload_image()
{
	var file_element = document.getElementById('browse_image').files[0];

	var file_name = file_element.name;

	var file_extension = file_name.split('.').pop().toLowerCase();

	var allowed_extension = ['png', 'jpg'];

	if(allowed_extension.indexOf(file_extension) == -1)
	{
		alert("Invalid Image File");

		return false;
	}

	var file_reader = new FileReader();

	var file_raw_data = new ArrayBuffer();

	file_reader.loadend = function()
	{

	}

	file_reader.onload = function(event){

		file_raw_data = event.target.result;

		conn.send(file_raw_data);
	}

	file_reader.readAsArrayBuffer(file_element);
}



function getonline(){

}






</script>
@include('Practice.footer')
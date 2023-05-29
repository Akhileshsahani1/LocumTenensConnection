@include('Practice.header')



    <!--Main layout-->
    <main class="main-body   ">
        <div class="container-fluid pe-xl-5 pe-0 ">

            <div class="heading ps-5 pe-5   pt-5 me-xxl-5 ">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                    <h3 class="p-20 fw-bold">Chat with Provider</h3>
                </div>
            </div>

            <div class="row px-5  pt-3 me-xxl-5 ">
                <div class="col-xl-4 col-12 mb-5 ">
                    <div class="container px-3">
                        <div class="mt-3 position-relative">
                            <input class="form-control w-100  ps-5 py-2 input-bg border-0 "
                                placeholder="Search..." id="search_people" onkeyup="search_user(' {{ Auth::user()->userId }} ', this.value);" />
                            <i class="bi bi-search position-absolute h5   " style="top: 12px; left:10px"></i>
                        </div>

                        <div class="list-group-item d-flex mt-3" id="search_people_area">
							
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-12 mb-5  bg-white" id="chat_area">
                   

                </div>


            </div>
        </div>
        <div style="height: 100px;"></div>
    </main>

    

    <script>
 
var conn = new WebSocket('ws://127.0.0.1:8090/?token={{ auth()->user()->userId}}');

var from_user_id = "{{ Auth::user()->userId }}";


var to_user_id = "";

var user_id="";


conn.onopen = function(e){

	console.log("Connection established!");

	load_unconnected_user(from_user_id);

	// load_unread_notification(from_user_id);

	// load_connected_chat_user(from_user_id);

};

 var online ;
 

conn.onmessage = function(e){
	
	var data = JSON.parse(e.data);
	
	console.log(data,'kdfllllllllllllllllllllllllll');


	// if(data?.count_unread_message)
	// {
	// 	console.log(data?.count_unread_message);
	// 	    // count_unread_sms(data?.count_unread_message)
	// }
	if(data?.chat_history){
		  
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
			    
				
				// style="
				// width: 10px;
				// height: 10px;
				// right: -32px;
				// bottom: -5px;
				// background-color: #03ca4c;
				// "
                //   online= data?.data[count]?.status;
			
				 if(data?.data[count]?.status=="Online"){
					 html += `
					 <div class="gap-4 chat-row  border-bottom bg-white" id="chat"  onclick="make_chat_area(`+data.data[count].userId+`, '`+data.data[count].name+`','`+data.data[count].status+`')" >
								  <div class="list-group-item d-flex">
									 <div class="me-4">
										 <div class="avatar position-absolute" style="width: 40px; height: 40px">
											 ${user_image}
										 </div>
										 
										 <div class="border rounded-circle position-relative"
											 style="
												 width: 10px;
												 height: 10px;
												 right: -32px;
												 bottom: -5px;
												 background-color: #03ca4c;
											 ">  
										 </div>
									 </div>
									 <div class="flex-fill ms-3" >
											 ${data?.data[count]?.status}
										 <div class="d-flex justify-content-between align-items-center">
											 <h6 href="#" class="d-block fw-bold p-14 mb-1 text-dark">
												  ${data?.data[count]?.name}
											 </h6>
											 <span class="p-10 text-dark"></span>
										 </div>
										 <div class="badge badge-circle bg-primary ms-5">
                                       <span>3</span>
                                    </div>
										 <div class="d-flex justify-content-between align-item-center">
											 <p class="fw-semibold text-dark p-10 mb-0">
												 Lorem Ipsum is simpl text...
											 </p>
											 <p class=" rounded-circle text-bg mb-0"><i class="bi bi-pin-angle-fill"></i></p>
										 </div>
									 </div>
								  </div>
								 </div>
					 `;

				 }else{
					 html += `
					 <div class="gap-4 chat-row  border-bottom bg-white " onclick="make_chat_area(`+data.data[count].userId+`, '`+data.data[count].name+`','`+data.data[count].status+`')">
								  <div class="list-group-item d-flex">
									 <div class="me-4">
										 <div class="avatar position-absolute" style="width: 40px; height: 40px">
											 ${user_image}
										 </div>
										 
										 <div class="border rounded-circle position-relative">
											  
										 </div>
									 </div>
									 <div class="flex-fill ms-3" >
											 ${data?.data[count]?.status}
										 <div class="d-flex justify-content-between align-items-center">
											 <h6 href="#" class="d-block fw-bold p-14 mb-1 text-dark">
												  ${data?.data[count]?.name}
											 </h6>
											 <span class="p-10 text-dark"></span>
										 </div>
										 <div class="d-flex justify-content-between align-item-center">
											 <p class="fw-semibold text-dark p-10 mb-0">
												 Lorem Ipsum is simpl text...
											 </p>
											 <p class=" rounded-circle text-bg mb-0"><i class="bi bi-pin-angle-fill"></i></p>
										 </div>
									 </div>
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
				<a href="#" class="list-group-item d-flex justify-content-between align-items-start" onclick="make_chat_area(`+data.data[count].id+`, '`+data.data[count].name+`'); load_chat_data(`+from_user_id+`, `+data.data[count].id+`); ">
					<div class="ms-2 me-auto">
				`;

				var last_seen = '';

				if(data.data[count].user_status == 'Online')
				{
					html += '<span class="text-success online_status_icon" id="status_'+data.data[count].id+'"><i class="fas fa-circle"></i></span>';

					last_seen = 'Online';
					
				}
				else
				{
					html += '<span class="text-danger online_status_icon" id="status_'+data.data[count].id+'"><i class="fas fa-circle"></i></span>';

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
						<div class="text-right"><small class="text-muted last_seen" id="last_seen_`+data.data[count].id+`">`+last_seen+`</small></div>
					</div>
					<span class="user_unread_message" data-id="`+data.data[count].id+`" id="user_unread_message_`+data.data[count].id+`"></span>
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

		if(data.from_user_id == from_user_id)
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

function make_chat_area(to_user_id,to_user_name,status)
{ 
    load_chat_data(to_user_id);
	user_id=to_user_id;
	console.log(to_user_id,"8888888888888888888888")
	
   if(status=='Online')
   {
				var html = `
				<div class="gap-4 chat-row p-2">
				
				<div class="list-group-item d-flex justify-content-between align-items-center sky-blue-bg py-2 px-2">
					<div class="d-flex" >
						<div class="me-4">
							<div class="avatar position-absolute" style="width: 40px; height: 40px">
								<img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
									style="height: 100%; width: 100%; object-fit: cover" />
							</div>
							<div class="border rounded-circle position-relative" style="
							width: 10px;
							height: 10px;
							right: -32px;
							bottom: -25px;
							background-color: #03ca4c;
							"></div>
						</div>
						<div class="flex-fill ms-3 ">
							<!-- Title -->
							<div class="d-flex justify-content-between align-items-center">
								<h6 href="#" class="d-block fw-bold mb-1 text-dark">
								${to_user_name}
								</h6>
							</div>
							<!-- Subtitle -->
							<div class="d-flex justify-content-between align-item-center">
								<p class="text-muted p-12 mb-0">${status}</p>
							</div>
						</div>
					</div>
					<div >
						<i class="bi bi-x-lg h6 px-3 "></i>
					</div>
				</div>
			</div>
			<div class="container" id="chatconnetion">
				<div>
					<div class="d-flex">
						<div class="me-2" style="width: 30px; height: 30px">
							<img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
								style="height: 30px; width: 30px; object-fit: cover" />
						</div>
						<div class="">
							<p class="rounded-5 p-12 p-2 px-3 receiver me-5 mb-4">
								Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
								nonumy eirmod tempor invidunt ut labore et
							</p>
						</div>
					</div>
					<div>
						<div class="d-flex justify-content-end">
							<div class="">
								<p class="rounded-5 p-12 p-2 px-3 sender ms-5 mb-4">
									Lorem ipsum dolor sit amet,etetur
								</p>
							</div>
							<div class="avatar ms-2" style="width: 30px; height: 30px">
								<img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
									style="height: 100%; width: 100%; object-fit: cover" />
							</div>
						</div>
					</div>
				</div>
			
			
				</div>
				<div>
					<span class="d-flex align-item-center mb-4 justify-content-evenly py-1 rounded-5 px-2"
					style="width: 50px; background-color: #f5f5f5">
					<p class="align-baseline rounded-5 me-1 mb-0"
						style="width: 8px; height: 8px; background-color: lightgray"></p>
					<p class="align-top rounded-5 me-1 mb-0"
						style="width: 8px; height: 8px; background-color: lightgray"></p>
					<p class="align-baseline rounded-5 me-1 mb-0"
						style="width: 8px; height: 8px; background-color: lightgray"></p>
				</span>
				<div class="  border-top w-100 p-2" style="height: 80px">
					<div class="position-relative">
						<input type="text" id="messagess" placeholder="Your message here... "
							class="w-100 form-control py-3  input-bg1 border-0 " />

						<div class="position-absolute chat-icon d-flex">
							<div class=" attachment  me-2 ">
								<img src="{{asset('Assets/images/clip.svg')}}" alt="">
							</div>
							<div class="send-button me-2">

							<button type="button" class="btn btn-success" id="send_button" onclick="send_chat_message(${to_user_id})"><i class="fas fa-paper-plane"></i></button>
							

							</div>
						</div>
					</div>
				</div>

				</div>


				`;

				document.getElementById('chat_area').innerHTML = html;

				document.getElementById('chat_header').innerHTML = 'Chat with <b>'+to_user_name+'</b>';

				document.getElementById('close_chat_area').innerHTML = '<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';

				to_user_id = user_id;

			}else{
					var html = `
					<div class="gap-4 chat-row p-2">
					
					<div class="list-group-item d-flex justify-content-between align-items-center sky-blue-bg py-2 px-2">
						<div class="d-flex" >
							<div class="me-4">
								<div class="avatar position-absolute" style="width: 40px; height: 40px">
									<img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
										style="height: 100%; width: 100%; object-fit: cover" />
								</div>
								<div class="border rounded-circle position-relative"></div>
							</div>
							<div class="flex-fill ms-3 ">
								<!-- Title -->
								<div class="d-flex justify-content-between align-items-center">
									<h6 href="#" class="d-block fw-bold mb-1 text-dark">
									${to_user_name}
									</h6>
								</div>
								<!-- Subtitle -->
								<div class="d-flex justify-content-between align-item-center">
									<p class="text-muted p-12 mb-0">${status}</p>
								</div>
							</div>
						</div>
						<div >
							<i class="bi bi-x-lg h6 px-3 "></i>
						</div>
					</div>
				</div>
				<div class="container" id="chatconnetion">
					<div>
						<div class="d-flex">
							<div class="me-2" style="width: 30px; height: 30px">
								<img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
									style="height: 30px; width: 30px; object-fit: cover" />
							</div>
							<div class="">
								<p class="rounded-5 p-12 p-2 px-3 receiver me-5 mb-4">
									Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
									nonumy eirmod tempor invidunt ut labore et
								</p>
							</div>
						</div>
						<div>
							<div class="d-flex justify-content-end">
								<div class="">
									<p class="rounded-5 p-12 p-2 px-3 sender ms-5 mb-4">
										Lorem ipsum dolor sit amet,etetur
									</p>
								</div>
								<div class="avatar ms-2" style="width: 30px; height: 30px">
									<img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
										style="height: 100%; width: 100%; object-fit: cover" />
								</div>
							</div>
						</div>
					</div>
				
				
					</div>
					<div>
						<span class="d-flex align-item-center mb-4 justify-content-evenly py-1 rounded-5 px-2"
						style="width: 50px; background-color: #f5f5f5">
						<p class="align-baseline rounded-5 me-1 mb-0"
							style="width: 8px; height: 8px; background-color: lightgray"></p>
						<p class="align-top rounded-5 me-1 mb-0"
							style="width: 8px; height: 8px; background-color: lightgray"></p>
						<p class="align-baseline rounded-5 me-1 mb-0"
							style="width: 8px; height: 8px; background-color: lightgray"></p>
					</span>
					<div class="  border-top w-100 p-2" style="height: 80px">
						<div class="position-relative">
							<input type="text" id="messagess" placeholder="Your message here... "
								class="w-100 form-control py-3  input-bg1 border-0 " />

							<div class="position-absolute chat-icon d-flex">
								<div class=" attachment  me-2 ">
									<img src="{{asset('Assets/images/clip.svg')}}" alt="">
								</div>
								<div class="send-button me-2">

								<button type="button" class="btn btn-success" id="send_button" onclick="send_chat_message(${to_user_id}); count_Unread_message(${to_user_id})"><i class="fas fa-paper-plane"></i></button>
								</div>
							</div>
						</div>
					</div>

					</div>


					`;

					document.getElementById('chat_area').innerHTML = html;

					document.getElementById('chat_header').innerHTML = 'Chat with <b>'+to_user_name+'</b>';

					

					to_user_id = user_id;

            }
	
	
}



// document.getElementById("leftside").childNodes[1];
function chathistory(chatData){

	document.getElementById("chatconnetion").innerHTML=chatData.map(e=>
	`<div class="container" id="chatconnetion">
        
        <div class="d-flex">
            <div class="me-2" style="width: 30px; height: 30px">
                <img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
                    style="height: 30px; width: 30px; object-fit: cover" />
            </div>
            <div class="" id="leftside">
                <p class="rounded-5 p-12 p-2 px-3 receiver me-5 mb-4">
                    ${e?.from_user_id==user_id?e?.chat_message:""}
                </p>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-end">
                <div class="">
                    <p class="rounded-5 p-12 p-2 px-3 sender ms-5 mb-4">
					${e?.from_user_id!=user_id?e?.chat_message:""}
                    </p>
                </div>
                <div class="avatar ms-2" style="width: 30px; height: 30px">
                    <img alt="..." src="{{asset('Assets/images/logo.svg')}}" class="rounded-circle"
                        style="height: 100%; width: 100%; object-fit: cover" />
                </div>
            </div>
        </div>
       </div>
   `
	)
}


function close_chat()
{
	document.getElementById('chat_header').innerHTML = 'Chat Area';

	document.getElementById('close_chat_area').innerHTML = '';

	document.getElementById('chat_area').innerHTML = '';

	to_user_id = '';
}

function send_chat_message(to_user_id)
{
	
	// document.querySelector('#send_button').disabled = true;
	// var message = document.getElementById('message_area').innerHTML.trim();
	var input = document.getElementById("messagess").value;
	console.log(from_user_id,'--',to_user_id)
	var data = {
		message : input,
		from_user_id : from_user_id,
		to_user_id : to_user_id,
		type : 'request_send_message'
	};
	// var data1 = {
	// 	message : input,
	// 	from_user_id : from_user_id,
	// 	to_user_id : to_user_id,
	// 	type : 'request_send_message'
	// };
	console.log(data,'ddatat');
	conn.send(JSON.stringify(data));
	// conn.send(JSON.stringify(data));

     
	document.querySelector('#messagess').value = '';

	// document.querySelector('#send_button').disabled = false;
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
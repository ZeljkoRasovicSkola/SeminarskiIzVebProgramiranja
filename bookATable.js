document.getElementById('bookATable').addEventListener('submit',(e)=>{
 e.preventDefault();

 let date=document.getElementById('date').value;
 let start=document.getElementById('start').value;
 let duration=document.getElementById('duration').value;
 let numberOfPeople=document.getElementById('numberOfPeople').value;
 let smoke=document.querySelector('input[name="smoke"]:checked').value;

 let startOfWorkingHoursMF=Number(document.getElementById('startOfWorkingHoursMF').value);
 let endOfWorkingHoursMF=Number(document.getElementById('endOfWorkingHoursMF').value);
 let startOfWorkingHoursS=Number(document.getElementById('startOfWorkingHoursS').value);
 let endOfWorkingHoursS=Number(document.getElementById('endOfWorkingHoursS').value);

 let table={};
 table['numberOfPeople']=numberOfPeople;
 table['smoke']=smoke;

 let end=start;
 let selectedDate=new Date(date);
 let dayOfTheWeek=selectedDate.getDay();

 let [hours, mins]=start.split(":");
 let endHours=Number(hours)+Number(duration);

 if(Number(mins)>0)
 {
  endOfWorkingHoursMF--;
  endOfWorkingHoursS--;
 }

 let jsonString=JSON.stringify(table);

 let html=document.getElementById('response');
 let endpoint="../bookingTables/tableSearch.php";

 let request= new Request(endpoint,
 {
  method:"POST",
  headers:
  {
   "Content-Type": "application/json",
  },
  body:jsonString
 });

 fetch(request)
 .then((response)=>
 {
  if(!response.ok)
  {
   throw new Error('Error, fetch can not be sended.');
  }
  return response.json();
 })
 .then((data) =>
 {
  if(data===false)
  {
   html.innerHTML=`
   <div class="flex">
    <div class="item bg">
     <p class="greyBg">There are no tables that meet the given conditions!</p>
    </div>
   </div>`;
  }
  else
  {
   end=`${endHours}:${mins}`;

   if(dayOfTheWeek===0)
   {
    html.innerHTML=`
    <div class="flex">
     <div class="item bg">
      <p class="greyBg">We do not work on Sunday!</p>
     </div>
    </div>`;
   }
   else if(dayOfTheWeek>0 && dayOfTheWeek<6)
   {
    if(Number(hours)<startOfWorkingHoursMF || Number(hours)>endOfWorkingHoursMF || endHours>endOfWorkingHoursMF)
    {
     html.innerHTML=`
     <div class="flex">
      <div class="item bg">
       <p class="greyBg">We do not work at that time on MF!</p>
      </div>
     </div>`;
    }
    else
    {
     html.innerHTML=`
     <div class="flex">
      <div class="item bg">
       <p class="greyBg">Table nuber: ${data.spotID}</p>
       <p class="greyBg">Number of seats: ${data.seat}</p>
       <p class="greyBg">Is it in smoke area: ${data.smoke}</p>
       <p class="greyBg">Date of reservation: ${date}</p>
       <p class="greyBg">Start time of reservation: ${start}</p>
       <p class="greyBg">End time of reservation: ${end}</p>
       <form method="POST" action="../bookingTables/bookSelectedTable.php" name="bookSelectedTable">
        <div class="flex">
         <input type="hidden" name="id" value="${data.spotID}">
         <input type="hidden" name="date" value="${date}">
         <input type="hidden" name="start" value="${start}">
         <input type="hidden" name="end" value="${end}">
         <input type="submit" class="button" name="submit" value="Book a table">
        </div>
        <br>
       </form>
      </div>
     </div>`;
    }
   }
   else if(dayOfTheWeek===6)
   {
    if(Number(hours)<startOfWorkingHoursS || Number(hours)>endOfWorkingHoursS || endHours>endOfWorkingHoursS)
    {
     html.innerHTML=`
     <div class="flex">
      <div class="item bg">
       <p class="greyBg">We do not work at that time on S!</p>
      </div>
     </div>`;
    }
    else
    {
     html.innerHTML=`
     <div class="flex">
      <div class="item bg">
       <p class="greyBg">Table nuber: ${data.spotID}</p>
       <p class="greyBg">Number of seats: ${data.seat}</p>
       <p class="greyBg">Is it in smoke area: ${data.smoke}</p>
       <p class="greyBg">Date of reservation: ${date}</p>
       <p class="greyBg">Start time of reservation: ${start}</p>
       <p class="greyBg">End time of reservation: ${end}</p>
       <form method="POST" action="../bookingTables/bookSelectedTable.php" name="bookSelectedTable">
        <div class="flex">
         <input type="hidden" name="id" value="${data.spotID}">
         <input type="hidden" name="date" value="${date}">
         <input type="hidden" name="start" value="${start}">
         <input type="hidden" name="end" value="${end}">
         <input type="submit" class="button" name="submit" value="Book a table">
        </div>
        <br>
       </form>
      </div>
     </div>`;
    }
   }
   else
   {
    html.innerHTML=`
    <div class="flex">
     <div class="item bg">
      <p class="greyBg">Table nuber: ${data.spotID}</p>
      <p class="greyBg">Number of seats: ${data.seat}</p>
      <p class="greyBg">Is it in smoke area: ${data.smoke}</p>
      <p class="greyBg">Date of reservation: ${date}</p>
      <p class="greyBg">Start time of reservation: ${start}</p>
      <p class="greyBg">End time of reservation: ${end}</p>
      <form method="POST" action="../bookingTables/bookSelectedTable.php" name="bookSelectedTable">
       <div class="flex">
        <input type="hidden" name="id" value="${data.spotID}">
        <input type="hidden" name="date" value="${date}">
        <input type="hidden" name="start" value="${start}">
        <input type="hidden" name="end" value="${end}">
        <input type="submit" class="button" name="submit" value="Book a table">
       </div>
       <br>
      </form>
     </div>
    </div>`;
   }
  }
 })
 .catch((error)=>
 {
  console.warn(error.message);
 });
});

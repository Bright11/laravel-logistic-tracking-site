 <div class="categeory opencategory" id="opencategory">
     <ul class="cateul">
         @forelse ($getallcat as $myc)
 <li><a href="/procategory/{{$myc->slug}}">{{$myc->name}}</a></li>
         @empty
 <li><a href="">No Category</a></li>
         @endforelse

     </ul>
 </div>


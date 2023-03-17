<div class="searchnewform showsearch" id="showsearch">
    <form class=" seeform" action="searchdata" method="GET">
    @csrf
    <input type="text" placeholder="Search Item" name="name" class="searchinput">
    <button type="submit" class="searchbtn">Search</button>
</form>
</div>
<style>
    .showsearch{
        display: none !important;
    }
    .searchnewform{
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .seeform{
        position: absolute;
        z-index: 99;
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 90%;
    }
    .seeform >input{
        padding: 10px;
        outline: none;
        width: 100%;
    }
</style>

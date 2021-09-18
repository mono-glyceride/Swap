<a href="{{ route('exhibits.create') }}" class="nav-link">
    <button type="button" class="btn btn-primary rounded-circle p-0 d-black d-md-none" id="exhibit_button">
        出品
    </button>
</a>

<style>
     #exhibit_button{
        position:fixed;
        right:17px;
        bottom:50px;
        transition:1s;
        opacity:0.7;
        width:5rem;
        height:5rem;
    }
    #exhibit_button:hover{
        opacity:1;
    }
</style>
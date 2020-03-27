<div class="card">
    <center>
        <div class="card-header">
            <b>{{ Auth::user()->name }}</b>
            <br>
            <small>Admin</small>
        </div>

        <div class="card-body">
            <div class="item mb-3">
                <a href="/admin">Dashboard</a>
            </div>
            
            <div class="item mb-3">
                <a href="/admin">My Pending Tickets</a>
            </div>

            <div class="card-item mb-3">
                <a href="/admin/{id}/treated_tickets">Treated Tickets</a>
            </div>
        </div>
    </center>
</div>

<footer class="pt-md-5 border-top bg-light mb-4">
    <div class="row container m-auto mt-3">
        <div class="col-6 col-md">
            <a class="link-secondary text-decoration-none" href="/" style="font-weight: bolder; font-size: x-large; color: #212529;">Discussly</a>
            <small class="d-block mb-3 text-muted">&copy; 2021</small>
        </div>
        <div class="col-6 col-md">
            <h5>Spaces</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-secondary text-decoration-none" href="/science">Science</a></li>
                <li><a class="link-secondary text-decoration-none" href="/technology">Technology</a></li>
                <li><a class="link-secondary text-decoration-none" href="/engineering">Engineering</a></li>
                <li><a class="link-secondary text-decoration-none" href="/maths">Maths</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-secondary text-decoration-none" href="/signup">Register</a></li>
                @guest
                    <li><a class="link-secondary text-decoration-none" href="/signup">Profile</a></li>
                @endguest
                @auth
                    <li><a class="link-secondary text-decoration-none" href="/users/{{Auth::id()}}">Profile</a></li>
                @endauth
                <li><a class="link-secondary text-decoration-none" href="/recover">Recover Password</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-secondary text-decoration-none" href="/about">About Us</a></li>
                <li><a class="link-secondary text-decoration-none" href="/contactus">Contact Us</a></li>
                <li><a class="link-secondary text-decoration-none" href="/faq">FAQ</a></li>
            </ul>
        </div>
    </div>
</footer>

use dg03_project;

insert into
    users
values
    ("test@123", "098f6bcd4621d373cade4e832627b4f6", "test", "2023-11-08"), /*pass: test*/
    ("admin@123", "21232f297a57a5a743894a0e4a801fc3", "admin", "2023-11-08"), /*pass: admin*/
    ("f32ee@localhost", "2138cb5b0302e84382dd9b3677576b24", "f32ee", "2023-11-08"); /*pass: password@123*/

insert into
    products
values
    (
        "Asus Zenbook 14",
        "Asus",
        "laptop",
        1500,
        "ASUS ZenBook 14 UX434FLC Laptop: Stay productive with this ASUS ZenBook laptop.
     The Intel Core i7 and 16GB of RAM let you run multiple programs at once, while the 512GB SSD offers ample quick file access and storage. This ASUS ZenBook laptop has an NVIDIA GeForce MX250 graphics card that renders crisp, clear visuals on the 14-inch Full HD NanoEdge display.",
        "images/asus_laptop.png"
    ),
    (
        "Apple iPad Air",
        "Apple",
        "tablet",
        980,
        "Introducing the sleek and powerful iPad Air, the perfect blend of performance and portability. With its stunning 10.9-inch Liquid Retina display, you'll experience vivid colors and crisp details in every image and video. Powered by the fast and efficient A14 Bionic chip, this iPad delivers seamless multitasking, allowing you to effortlessly edit videos, play graphics-intensive games, or run the latest apps with ease.",
        "images/apple_ipad.jpeg"
    ),
    (
        "Sennheiser HD 600",
        "Sennheiser",
        "Audio",
        899,
        "Enjoy your music on a completely new level. An intimate, relaxed sound signature combines with outstanding precision and exceptional comfort — and now, extended sub bass — for a deeply moving experience.",
        "images/sennheiser_1.jpg"
    ),
    (
        "JBL Jr310BT",
        "JBL",
        "audio",
        90.90,
        "JBL Safe Sound\n
        JBL legendary sound designed to never exceed 85dB making them safe for even the youngest music fans.\n
        Bluetooth enabled
        A wireless connection up to 15 meters away means no wires to worry about.\n
        Built-in mic
        Help your kids stay connected to the world with the built-in mic. They can chat easily with friends and family during downtime, or teachers while they’re busy learning.",
        "images/jbl.jpg"
    ),
    (
        "Apple MacBook Pro 16",
        "Apple",
        "laptop",
        3225.50,
        "Experience unparalleled power and performance with the Apple MacBook Pro 16-inch. This cutting-edge laptop boasts a stunning 16-inch Retina display, delivering vibrant colors and sharp details. Equipped with a powerful processor, ample storage, and robust graphics capabilities, it's designed to handle intensive tasks with ease. The Magic Keyboard, immersive audio, and an array of ports further enhance its user experience. Whether you're a creative professional, a power user, or an everyday enthusiast, the MacBook Pro 16-inch offers exceptional speed, functionality, and a stunning display, making it an ideal choice for those who demand top-tier performance in a portable package.",
        "images/macbook.jpg "
    ),
    (
        "Sennheiser HD 400S",
        "Sennheiser",
        "audio",
        100,
        "Closed-back design and ergonomic earpads reduce background noise and provide immersive detail.
        Integrated 3-button smart remote with in-line microphone for controlling calls and music.
        Handy single-sided tangle free cable.",
        "images/sennheiser_2.jpg"
    ),
    (
        "Samsung Galaxy Tab S9 Ultra",
        "Samsung",
        "tablet",
        3500,
        "Extremely fast Snapdragon 8 Gen 2 For Galaxy processor engineered for revved-up performance and power savings for champion-level gameplay9,10, The graphics engine powers true-to-life reflections and shadows in 3D gaming environments",
        "images/samsung_tablet.jpg"
    ),
    (
        "Lenovo IdeaPad",
        "Lenovo",
        "laptop",
        750.89,
        "The Lenovo IdeaPad series offers a diverse range of laptops designed to cater to various user needs. Whether you're a student, a professional, or an everyday user, the IdeaPad lineup provides reliable performance, sleek design, and versatility. These laptops often feature vibrant displays, powerful processors, ample storage, and different sizes to suit different preferences. With a balance of affordability and functionality, Lenovo IdeaPad laptops are known for their user-friendly interfaces, durability, and compatibility with a wide range of applications, making them a popular choice for users seeking a dependable, all-purpose computing solution.",
        "images/lenovo_laptop.jpg"
    ),
    (
        "Apple iPhone 15",
        "Apple",
        "phone",
        2100.50,
        "Renowned for its sleek design, user-friendly interface, and powerful performance, the iPhone features cutting-edge technology, high-quality cameras, and seamless integration with the Apple ecosystem. Offering a wide range of models catering to diverse needs and budgets, the iPhone is known for its reliability, security features, and access to a vast array of apps on the App Store. Whether you're a casual user, a photography enthusiast, or a professional seeking top-tier performance, the iPhone series provides a versatile and premium mobile experience.",
        "images/apple_iphone.png"
    ),
    (
        "Samsung Galaxy Book3 Pro",
        "Samsung",
        "laptop",
        2500.62,
        "The Samsung Galaxy Book Pro is a lightweight, ultra-slim laptop designed for versatility and performance. With a stunning AMOLED display, it offers vibrant colors and sharp details. Powered by Intel's 11th Gen processors, it ensures smooth multitasking and efficient performance. The Galaxy Book Pro boasts long battery life, a comfortable keyboard, and a sleek, portable design. Equipped with Windows 10, it's suitable for productivity, entertainment, and on-the-go tasks. Whether you're a professional, a student, or a casual user, the Galaxy Book Pro combines style, power, and portability in a single package.",
        "images/galaxybook3pro.png"
    ),
        (
        "Samsung Galaxy Buds2",
        "Samsung",
        "audio",
        450.59,
        "The Samsung Galaxy Buds 2 offer a seamless audio experience in a compact and stylish design. These true wireless earbuds deliver clear, balanced sound with active noise cancellation to tune out distractions. They boast a comfortable fit, long-lasting battery life, and touch controls for easy navigation. With their compact charging case and compatibility with Android and iOS devices, the Galaxy Buds 2 provide a convenient and high-quality audio solution for on-the-go lifestyles.",
        "images/galaxybuds2pro.png"
    );
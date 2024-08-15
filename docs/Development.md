# Development of a Database-Driven Web Application for NCEA Level 3

Project Name: **PBS Forums**

Project Author: **Daniel Thomas**

Assessment Standards: **91902** and **91903**


-------------------------------------------------

## Design, Development and Testing Log

## 16/05/24

![Database](images/mysql.png)

### **Planning the database in DrawSQL**

I began working on planning the potential database using DrawSQL. This will be used as a framework for what the actual database may function like and look like in MySQL clearly and concisely. I gave "forum topics" (sections i.e. general, off-topic) their own database instead of being a column under threads because this means admins could add new topics to the site through an admin menu, instead of having to hardcode it in the sites HTML/CSS.

## 17/05/24

![Excalidraw flowchart](images/flowchart.png)

### **Excalidraw flowchart prototype**

I started working on a flowchart in Excalidraw which illustrates how the website will flow and function on a base level. The yellow circles represent where the user starts, blue squares are pages, purple diamonds are header buttons and red/green boxes are functional buttons.

> A user suggested that the database be updated to include the admin permissions under "users"

The DrawSQL "users" database now includes an admin column which is a boolean.

![Updated database](images/mysql-2.png)

## 24/05/2024

![Figma design](images/figma.png)

### **Figma website design prototype**

I began to work on the prototype layout and flow of the website using the site Figma.

I decided to prioritize the mobile design first and then I would do the desktop design later. This design also doesn't have a color scheme so I stuck to greys since it would make it easier to apply color palettes later. I also used lorem ipsum text and placeholder images/icons to demonstrate where text/images would occur while not breaking the flow of the site. I wanted to use simple and clear fonts for easy readability and I tried to fill as much of the screen as possible to not create dead space and for an efficient design.

I intend to present this design to my end-user for refinements and improvements as well as potential ideas for a color scheme and desktop design.

## 31/05/2024

> ![alt text](image.png)
> ![alt text](image-1.png)
> ![alt text](image-5.png)

### **Figma website design prototype 2**

After presenting the design to my end users, I recieved some feedback on the design.

They felt that the gradient made the UI look slightly outdated and that it should be up to modern design principles, so I toned down the gradient effect on the background and the header. They also felt that the buttons shouldn't be at the top from a user experience perspective, so I moved them down to the bottom.

![alt text](image-4.png)

### **Figma desktop design prototype**

I also began working on the desktop version of the design. I wanted a layout reminiscent of old web forums but with updated visuals and useability adhering to the useability heuristics. I created a table-like design for the forum category selection menu.

![alt text](image-6.png)

## 02/05/2024

I sent the new mobile design back to my end users who were overall happy with the design meaning I could move forward to doing the color palette.

> ![alt text](image-9.png)

I then got some feedback for the desktop design and required a few little tweaks.

> ![alt text](image-14.png)

I also began to work on a color palette for the site:

![alt text](image-8.png)

### Color palette

I came up with this color palette and sent it to my end users. I selected these colors because the darker palette is easy on the eyes and the text is nice and contrasted to the dark background. Not to mention, the foreground elements stand out a lot compared to the background which helps with readability. The orange accent is for when buttons and such are hovered over and massively contrasts with the blue, as orange opposes blue on a color wheel.

## 03/05/2024

> ![alt text](image-10.png)
> ![alt text](image-11.png)
> ![alt text](image-13.png)

I sent the color palette to my end users for feedback. They suggested to make it similar to Discord's color palette, which is a little more muted and maybe easier to read. They weren't a big fan of the shade of blue I used too.

I came up with a new color palette that's a little toned down:

![alt text](image-16.png)

I also updated the desktop design following the feedback I received:

![alt text](image-18.png)

## 04/05/2024

I got some feedback on the new color palette:

> ![alt text](image-15.png)
> ![alt text](image-17.png)

And quickly applied these changes so I could finalize the color palette with my end users. I also sent back the desktop design so I could finalize that design.

## 05/05/2024

I got the feedback on the color palette and it needed a bit of tweaking on the navbar, which I quickly fixed.

![alt text](image-19.png)

Here was my finalized mobile design after adjusting the shade of grey for contrast:

![alt text](image-21.png)

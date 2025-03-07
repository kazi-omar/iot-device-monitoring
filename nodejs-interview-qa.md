# Node.js - Top 100 Interview Questions and Answers

## Table of Contents
1. [Node Basics and Fundamentals](#node-basics-and-fundamentals)
2. [Node Main Features](#node-main-features)
3. [Project Setup and Modules](#project-setup-and-modules)
4. [Built-in Modules in Node](#built-in-modules-in-node)
5. [Express Framework](#express-framework)
6. [Middleware](#middleware)
7. [Types of Middleware](#types-of-middleware)
8. [Routing](#routing)
9. [Template Engines](#template-engines)
10. [REST API Basics](#rest-api-basics)
11. [HTTP Methods and Status Codes](#http-methods-and-status-codes)
12. [CORS, Serialization, and Deserialization](#cors-serialization-and-deserialization)
13. [Authentication and Authorization](#authentication-and-authorization)
14. [Error Handling and Debugging](#error-handling-and-debugging)

---

## Node Basics and Fundamentals

### What is Node.js?
Node.js is a runtime environment for executing JavaScript code on the server-side. It is neither a language nor a framework. A runtime environment is responsible for memory management and converting high-level languages to lower-level languages that the system can understand.

### What is the difference between a framework and a runtime environment?
- **Runtime environment**: Focuses on providing infrastructure for code execution including memory management and I/O operations
- **Framework**: Focuses on simplifying development by offering structured tools, libraries, best practices, and reusable components

### What is the difference between Node.js and Express.js?
- **Node.js**: A runtime environment that allows JavaScript execution on the server side
- **Express.js**: A framework built on top of Node.js, designed to simplify building web applications and APIs by providing routing systems and middleware support

### What are the differences between client-side and server-side?
| Client-side (Browser) | Server-side (Node.js) |
|------------------------|----------------------|
| Runs in the user's web browser | Runs on the server |
| Uses HTML, CSS, JavaScript | Uses JavaScript |
| Has document, window, navigator objects | Has request, response, server objects |
| Handles UI display and user interaction | Handles business logic, data storage, authentication |

---

## Node Main Features

### What are the seven main features of Node?
1. Single-threaded programming
2. Asynchronous execution
3. Event-driven architecture
4. Uses V8 JavaScript engine
5. Cross-platform compatibility
6. NPM (Node Package Manager)
7. Real-time capabilities

### What is single-threaded programming?
Single-threaded programming means using a single thread to execute tasks. A single thread is responsible for starting a task and can achieve both synchronous and asynchronous operations.

### What is synchronous programming?
Synchronous programming means each task is performed one after the other. Each task waits for the previous task to be completed before starting. This approach is blocking and can affect performance.

### What is multi-threaded programming?
Multi-threaded programming uses multiple threads to execute tasks in parallel. When one thread starts a task, another thread can be created to start the next task simultaneously, improving performance for CPU-intensive tasks.

### What is asynchronous programming?
Asynchronous programming allows tasks to run concurrently using a single thread. The thread initiates each task without waiting for completion and moves to the next task. When a task completes, it raises an event that the thread handles. This makes Node.js non-blocking and efficient.

### What are events, event emitter, event queue, event loop, and event-driven in Node?
- **Event**: A signal that something has happened in a program
- **Event Emitter**: The source that generates events
- **Event Queue**: Storage for all generated events
- **Event Handler/Listener**: Functions that perform actions when events occur
- **Event Loop**: The process of picking events one by one from the queue
- **Event-driven Architecture**: Operations in Node are driven by events

### What are the main features and advantages of Node?
| Feature | Advantage |
|---------|-----------|
| Asynchronous operations | Handles multiple concurrent requests with non-blocking execution |
| V8 JavaScript engine | Fast code execution |
| Event-driven architecture | Efficient handling of asynchronous operations and events |
| Cross-platform | Supports various operating systems enhancing flexibility |
| JavaScript language | No need to learn a new language for both client and server |

### What are the disadvantages of Node? When to use or not use Node?
**When to use Node:**
- Real-time applications (chat, gaming)
- Lightweight, scalable REST APIs
- Microservices architecture

**When not to use Node:**
- CPU-intensive tasks (video processing, heavy AI algorithms)
- Applications requiring multi-threading

---

## Project Setup and Modules

### How to set up a Node project?
1. Download and install Node.js
2. Download and install a code editor (like VS Code)
3. Create a new project folder
4. Open the folder in VS Code
5. Run `npm init -y` in the terminal
6. Create app.js file
7. Run the project with `node app.js`

### What is npm? What is the role of node_modules folder?
NPM is the Node Package Manager that manages dependencies for Node projects. The node_modules folder contains all these dependencies.

### What is the role of package.json file in Node?
The package.json file contains the project metadata (information about your project) such as name, version, description, author, and license.

### What are modules in Node? What is the difference between a function and a module?
A module contains specific functionality that can be reused within a Node.js application. Typically, one JavaScript file represents one module. 

**Difference between a module and a function:**
- Module is a broader concept that encapsulates functionality
- Function is a specific set of instructions within a module
- Modules can contain multiple functions and variables

### How many ways are there to export a module?
1. Using `module.exports` object:
```javascript
module.exports.functionName = functionName;
```

2. Direct export:
```javascript
module.exports = functionName;
```

### What will happen if you do not export the module?
If you don't export the module, its functions will not be available outside the module.

### How to import single or multiple functions from a module?
- For a single exported function:
```javascript
const module = require('./modulePath');
module(params);
```

- For multiple exported functions:
```javascript
const module = require('./modulePath');
module.functionName(params);
```

### What is module wrapper function?
In Node.js, each module is automatically wrapped in a function before execution. This allows variables within the module to remain private and not pollute the global scope.

### What are the types of modules in Node?
1. **Built-in modules (core modules)**: Already present in Node.js providing essential functionalities (file system, HTTP, path)
2. **Local modules**: User-defined modules developed as per project requirements
3. **Third-party modules**: External packages created by the community for additional functionality, installed via npm

---

## Built-in Modules in Node

### What are the top five built-in modules commonly used in Node projects?
1. FS module (File System)
2. Path module
3. OS module (Operating System)
4. Events module
5. HTTP module

### Explain the role of the FS module. Name some functions of it.
The FS module provides methods for interacting with the file system.

Functions:
- `readFile()`: Read content from a file asynchronously
- `writeFile()`: Write content to a file
- `appendFile()`: Append new data to existing file data
- `unlink()`: Delete a specified file
- `readdir()`: Read content of a directory
- `mkdir()`: Create a new directory
- `rmdir()`: Remove a specified directory

### Explain the role of the Path module. Name some functions of it.
The Path module provides utilities for working with file and directory paths.

Functions:
- `path.join()`: Join folder and file names to create a full path
- `path.parse()`: Convert a path string into an object with properties (root, dir, base, name, ext)
- `path.resolve()`: Resolve a sequence of paths to an absolute path
- `path.basename()`: Get the filename from a path
- `path.dirname()`: Get the directory name from a path
- `path.extname()`: Get the file extension from a path

### Explain the role of the OS module. Name some functions of it.
The OS module provides methods for interacting with the operating system.

Functions:
- `os.type()`: Get the type of operating system
- `os.userInfo()`: Get user information of the operating system
- `os.totalmem()`: Get the total memory of the system
- `os.freemem()`: Get the free memory available

### Explain the role of Events module. How to handle events in Node?
The Events module facilitates working with events in Node.js through the EventEmitter class.

To implement:
```javascript
const events = require('events');
const EventEmitter = events.EventEmitter;
const myEmitter = new EventEmitter();

// Register event listener
myEmitter.on('eventName', function(arg1, arg2) {
  console.log('Event occurred with arguments:', arg1, arg2);
});

// Emit event
myEmitter.emit('eventName', 'argument1', 'argument2');
```

### What are event arguments?
Event arguments are additional information passed when emitting events, which are received by the event listener's callback function parameters.

### What is the difference between a function and an event?
- **Function**: A reusable piece of code that performs a specific task when called
- **Event**: Represents an action or occurrence, which may trigger one or multiple functions

### What is the role of HTTP module in Node?
The HTTP module creates an HTTP server that listens to server ports and gives responses back to clients. It enables hosting a Node.js application on the internet.

### What is the role of createServer method of the HTTP module?
The createServer method creates an HTTP server that can handle requests and responses. It takes a callback function that executes when a request is received.

Example:
```javascript
const http = require('http');
const server = http.createServer((req, res) => {
  res.writeHead(200, {'Content-Type': 'text/plain'});
  res.end('Hello World\n');
});
const port = 3000;
server.listen(port, () => {
  console.log(`Server running at http://localhost:${port}/`);
});
```

---

## Express Framework

### What are the advantages of using Express with Node?
1. Simplifies web development with built-in methods and features
2. Middleware support for handling requests and responses
3. Flexible routing system for directing requests to appropriate handlers
4. Template engine integration for creating dynamic HTML content

### How do you install Express in a Node project?
```bash
npm install express
```

### How to create an HTTP server using Express.js?
```javascript
const express = require('express');
const app = express();
const port = 3000;

app.listen(port, () => {
  console.log(`Express server running at http://localhost:${port}`);
});
```

### How do you create and start an Express application?
1. Import the Express module: `const express = require('express');`
2. Create Express application: `const app = express();`
3. Start the server: `app.listen(port, callback);`

---

## Middleware

### What is middleware in Express.js and when to use them?
Middleware in Express is a function that handles HTTP requests, performs operations on the request, and passes control to the next middleware. Middleware functions are used for:
- Logging requests
- Authentication and validation
- Security checks
- Error handling

### How to implement middleware in Express?
```javascript
const express = require('express');
const app = express();

// Define middleware
function myMiddleware(req, res, next) {
  console.log('Middleware executed');
  next(); // Call next middleware
}

// Use middleware
app.use(myMiddleware);

app.listen(3000, () => {
  console.log('Server started');
});
```

### What is the purpose of the app.use function in Express?
The app.use method executes middleware globally for all requests. It applies the middleware to every HTTP request that comes to the application.

### What is the purpose of the next parameter in Express.js?
The next parameter is a callback function used to pass control to the next middleware function in the stack. If not called, the request-response cycle ends and subsequent middleware is not executed.

### How to use middleware globally for a specific route?
```javascript
app.use('/example', (req, res, next) => {
  console.log('This middleware runs only for routes containing /example');
  next();
});
```

### What is the request pipeline in Express?
The request pipeline is a series of middleware functions that handle HTTP requests and pass control to the next function. All incoming requests must pass through this pipeline before reaching application endpoints.

---

## Types of Middleware

### What are the types of middleware in Express.js?
1. Application-level middleware
2. Router-level middleware
3. Error-handling middleware
4. Built-in middleware
5. Third-party middleware

### What is the difference between application-level and router-level middleware?
- **Application-level middleware**: Applied globally using `app.use()` for all requests
- **Router-level middleware**: Applied only to specific routes using `router.use()` or by including it in route definitions

### What is error handling middleware and how to implement it?
Error handling middleware is used to capture and process errors. It has four parameters (error, request, response, next).

```javascript
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(500).send('Something broke!');
});
```

### In which middleware should you do the error handling?
Always handle errors in the last middleware in your application because Express.js will directly jump to the error-handling middleware when an error occurs, skipping any middleware in between.

### What is built-in middleware? How to serve static files from Express.js?
Built-in middleware is included within Express.js. To serve static files:

```javascript
app.use(express.static('public'));
```

This serves all files in the 'public' directory directly without authentication.

### What are third-party middleware? Give some examples.
Third-party middleware are packages created by the community that provide additional functionality. Examples:

- **helmet**: For setting HTTP security headers
- **body-parser**: For parsing request bodies
- **compression**: For compressing HTTP responses
- **morgan**: For request logging

### Can you summarize all the types of middleware?
1. **Application-level middleware**: Global middleware applied using `app.use()`
2. **Router-level middleware**: Applied to specific routes
3. **Error-handling middleware**: For handling errors with four parameters (err, req, res, next)
4. **Built-in middleware**: Express's included middleware like `express.static()`
5. **Third-party middleware**: External packages from npm

### What are the advantages of using middleware in Express.js?
1. **Modularity**: Breaking down applications into smaller, reusable components
2. **Reusability**: Using the same middleware at multiple places
3. **Improved request handling**: Better validation and processing of requests
4. **Flexible control flow**: Deciding which middleware applies to which routes
5. **Third-party integration**: Using external middleware for additional functionality

---

## Routing

### What is routing in Express?
Routing in Express is the process of directing incoming HTTP requests to the appropriate handler functions based on the request method and URL path.

### What is the difference between middleware and routing in Express?
- **Middleware**: A function that accesses request/response objects, performs logic, and calls the next middleware
- **Routing**: A process that directs requests to appropriate handlers without performing logic on the request

### How to implement routing? How do you define routes in Express?
```javascript
const express = require('express');
const app = express();

// Define a route for GET requests
app.get('/', (req, res) => {
  res.send('Home Page');
});

// Define a route for POST requests
app.post('/login', (req, res) => {
  res.send('Login Page');
});

app.listen(3000);
```

### How to handle routing in Express real applications?
In real applications, routing is organized by importing controllers and defining routes that redirect to controller methods:

```javascript
const express = require('express');
const app = express();
const orderController = require('./controllers/orderController');

app.get('/orders/:id', orderController.getOrderById);
app.post('/orders', orderController.createOrder);
app.put('/orders/:id', orderController.updateOrder);

app.listen(3000);
```

### What are route handlers?
Route handlers are callback functions that process requests and generate responses for specific routes. They are the second argument in route definitions:

```javascript
app.get('/users', (req, res) => {
  // This is the route handler
  res.send('Users list');
});
```

### What are route parameters in Express?
Route parameters are named URL segments used to capture values at specific positions in the URL:

```javascript
app.get('/users/:userId', (req, res) => {
  const userId = req.params.userId;
  res.send(`User details for ID: ${userId}`);
});
```

### What are router object and router methods and how to implement them?
Router object is a mini version of the Express application for handling routes. Router methods define routes for HTTP methods like GET, POST, etc.

```javascript
const express = require('express');
const router = express.Router();

// Define routes
router.get('/', (req, res) => {
  res.send('Root route');
});

router.get('/about', (req, res) => {
  res.send('About page');
});

// Export router
module.exports = router;

// In app.js
const routes = require('./routes');
app.use('/api', routes);
```

### What are the types of router methods?
1. `router.get()`: For handling GET requests
2. `router.post()`: For handling POST requests
3. `router.put()`: For handling PUT requests
4. `router.delete()`: For handling DELETE requests

### What is the difference between app.get and router.get methods?
- **app.get**: Defines routes directly on the application object and mounts them automatically
- **router.get**: Defines routes on a router object that must be exported and mounted with app.use()

**Advantages of router.get**:
- Routes can be reused in different parts of the application
- Code is more modular and organized
- Better for applications with many routes

### What is express.Router in Express.js?
express.Router is a class that returns a router object for creating modular, mountable route handlers.

### Share a real application use of routing.
Authentication using routing:

```javascript
const router = express.Router();

// Middleware for authentication
function authenticate(req, res, next) {
  if (!req.headers.authorization) {
    return res.status(401).send('Unauthorized');
  }
  next();
}

// Protected route with middleware
router.get('/protected', authenticate, (req, res) => {
  res.send('Protected resource');
});

app.use('/api', router);
```

### What is route chaining in Express?
Route chaining is defining multiple middleware or route handlers for a single route:

```javascript
app.get('/',
  (req, res, next) => {
    console.log('Middleware 1');
    next();
  },
  (req, res, next) => {
    console.log('Middleware 2');
    next();
  },
  (req, res) => {
    res.send('Route handler');
  }
);
```

### What is route nesting in Express?
Route nesting is organizing routes hierarchically by grouping related routes under a common URL prefix:

```javascript
// userRoutes.js
const router = express.Router();
router.get('/', getAllUsers);
router.get('/profile', getUserProfile);
module.exports = router;

// productRoutes.js
const router = express.Router();
router.get('/', getAllProducts);
router.get('/featured', getFeaturedProducts);
module.exports = router;

// app.js
app.use('/users', userRoutes);
app.use('/products', productRoutes);
```

### How to implement route nesting in Express?
Create separate router files for different resource types, export them, and mount them at specific URL prefixes in the main application file.

---

## Template Engines

### What are template engines in Express?
Template engines are libraries that enable developers to generate dynamic HTML content by combining static HTML templates with data. They merge templates and data to create complete HTML documents.

### Name some template engine libraries.
1. EJS (Embedded JavaScript)
2. Handlebars
3. Pug
4. Mustache
5. Nunjucks

### How to implement EJS templating engine in Express application?
1. Install EJS: `npm install ejs`
2. Create a views folder with an HTML template (index.ejs)
3. Set the view engine to EJS: `app.set('view engine', 'ejs')`
4. Set the views directory: `app.set('views', path.join(__dirname, 'views'))`
5. Use the render method to combine the template with data:
   ```javascript
   app.get('/', (req, res) => {
     res.render('index', { title: 'My Application' });
   });
   ```

---

## REST API Basics

### What are REST and RESTful API?
REST (Representational State Transfer) is an architectural style for designing network applications. A RESTful API is a service that follows REST principles for transferring data over a network.

### What are the HTTP request and HTTP response structure in the UI and REST API?
**HTTP Request structure:**
- Action (GET, POST, etc.) and URL
- HTTP type
- Server address
- Request body (optional)
- Request headers

**HTTP Response structure:**
- Status code (200, 404, etc.)
- Content type (JSON, HTML, etc.)
- Response body

### What are the top five REST guidelines and the advantages of them?
1. **Separation of client and server**:
   - Makes maintenance easier
   - Allows multiple UI applications for a single API

2. **Stateless APIs**:
   - Server doesn't store request information
   - Makes the server lightweight and simplified

3. **Uniform interface**:
   - Each URL represents a unique service
   - Makes API resources easy to understand and use

4. **Cacheable responses**:
   - Improves response speed and performance for frequently accessed data

5. **Layered system**:
   - Follows architectural patterns like MVC
   - Enables modular design with independent components

### What is the difference between REST API and SOAP API?
| Feature | REST API | SOAP API |
|---------|----------|----------|
| Architecture | Architectural style | Protocol |
| Protocol | Uses HTTP/HTTPS | Can use HTTP, SMTP, etc. |
| Format | Lightweight (JSON, XML) | Typically XML (heavier) |
| State | Stateless | Can be stateful or stateless |
| Error handling | Uses HTTP status codes | Defines its own fault mechanism |
| Performance | Generally lightweight and faster | Can be slower due to XML processing |

---

## HTTP Methods and Status Codes

### What are HTTP verbs and HTTP methods?
HTTP methods (also called HTTP verbs) are functions that a client can perform on a resource, indicating the desired action to be performed.

### What are the GET, POST, PUT, and DELETE HTTP methods?
- **GET**: Retrieves data from a specified resource (e.g., `/users` to get all users)
- **POST**: Submits data to be processed (e.g., `/users` with user data to create a new user)
- **PUT**: Updates a resource or creates it if it doesn't exist (e.g., `/users/123` to update user 123)
- **DELETE**: Removes a resource (e.g., `/users/123` to delete user 123)

### What is the difference between the PUT and PATCH methods?
- **PUT**: Performs a complete replacement of a resource with the request data
- **PATCH**: Performs a partial update, modifying only the fields included in the request

### Explain the concept of idempotent in RESTful API.
Idempotent means performing the same operation multiple times will always give the same result. GET, PUT, and DELETE are idempotent methods, while POST is not idempotent as it creates a new resource each time.

### What is the role of status codes in RESTful APIs?
Status codes convey the results of a client request. They indicate whether a request was successful, required redirection, or encountered an error.

Status code categories:
- 1xx: Informational responses
- 2xx: Successful responses (200 OK, 201 Created, 204 No Content)
- 3xx: Redirection messages
- 4xx: Client error responses (400 Bad Request, 401 Unauthorized, 403 Forbidden, 404 Not Found)
- 5xx: Server error responses (500 Internal Server Error)

---

## CORS, Serialization, and Deserialization

### What is CORS in RESTful APIs?
CORS (Cross-Origin Resource Sharing) is a security feature in web browsers that restricts web pages from making requests to domains different from the one that served the original page. By default, browsers block cross-origin requests.

CORS will restrict data sharing when:
1. Requests go to a different domain (example.com to xyz.com)
2. Requests go to a subdomain (example.com to api.example.com)
3. Protocol mismatch (HTTP to HTTPS)
4. Different port numbers

### How to remove CORS restriction on RESTful API?
To enable CORS in a Node.js/Express application:

```javascript
const cors = require('cors');
app.use(cors()); // Allow all origins

// OR configure specific origins
app.use(cors({
  origin: 'https://example.com'
}));
```

### What are serialization and deserialization?
- **Serialization**: Converting a data object into a format that can be sent over a network or stored (e.g., object to JSON)
- **Deserialization**: Converting the received format back into a data object (e.g., JSON to object)

### What are the types of serialization?
1. Binary serialization: Converting data to binary/byte format
2. XML serialization: Converting objects to XML format
3. JSON serialization: Converting objects to JSON format (most popular)

### How to serialize and deserialize in Node.js?
- **Serialization**: `JSON.stringify(object)`
- **Deserialization**: `JSON.parse(jsonString)`

### Explain the concept of versioning in RESTful APIs.
API versioning is maintaining multiple versions of an API to support backward compatibility. It allows clients to keep using older versions while new features are added.

Example versioning in URLs:
- `/api/v1/users`
- `/api/v2/users`
- `/api/v3/users`

### What is an API document? What are the popular documentation formats?
An API document describes the functionality, features, and usage of a REST API. It helps developers understand how to use the API's services.

Popular documentation formats:
- Swagger/OpenAPI
- RAML
- API Blueprint

### What is the typical structure of a REST API project in Node?
- `/node_modules`: NPM packages
- `/src`: Source code
  - `/controllers`: Business logic and API endpoints
  - `/models`: Data models and properties
  - `/routes`: Routing configuration
  - `/utils`: Helper methods
- `app.js`: Entry point
- `.gitignore`: Files to exclude from version control
- `package.json`: Project metadata and dependencies

---

## Authentication and Authorization

### What are authentication and authorization?
- **Authentication**: Verifying a user's identity (who you are)
- **Authorization**: Determining what resources a user can access (what you can do)

Authentication always happens before authorization.

### What are the types of authentication in Node?
1. Basic authentication
2. API key authentication
3. Token-based authentication (including JWT)
4. Multi-factor authentication
5. Certificate-based authentication

### What is basic authentication?
Basic authentication is where users log in with a username and password. These credentials are sent to the API, which validates them against a database.

**Disadvantage**: Username and password are sent as plain text over the network and typically stored in plain text in the database, creating security risks.

### What are the security risks associated with storing passwords as plain text in Node.js?
- **Unauthorized access**: If a database is compromised, hackers can directly use the passwords
- **Compromise of other accounts**: Many users reuse passwords across different services

### What is the role of hashing and salt in securing passwords?
- **Hashing**: Converting a password into an encrypted string using an algorithm (e.g., SHA-256)
- **Salt**: A random string added to the password before hashing to make each hash unique

The process:
1. Generate a random salt
2. Combine the salt with the password
3. Apply a hashing algorithm to create a secure password
4. Store the salt and hashed password in the database

### What is API key authentication?
API key authentication involves using a single key shared with clients to authenticate requests. The key is passed in the request header.

**Disadvantage**: The same key is shared with multiple clients and can be easily passed to unauthorized users.

### What is token-based authentication and JWT authentication?
Token-based authentication uses tokens instead of repeatedly sending credentials. JWT (JSON Web Token) is a popular token format.

JWT authentication process:
1. User sends credentials to the API
2. API validates credentials and generates a JWT
3. Client stores the JWT in local storage or cookies
4. Client sends the JWT in the header of subsequent requests
5. API validates the token for each request
6. If the token is valid, API sends the requested data

### What are the parts of the JWT token?
A JWT token has three parts separated by periods:
1. **Header**: Contains token type and algorithm (e.g., HS256)
2. **Payload**: Contains claims (issuer, subject, expiration time)
3. **Signature**: Created by encoding the header and payload, used for verification

### Where does JWT token reside in the request?
The JWT token resides in the request header, typically using the "Authorization" key with the value format: "Bearer [token]".

---

## Error Handling and Debugging

### What is error handling? How many ways can you implement error handling in Node applications?
Error handling is the process of managing errors during program execution. Methods in Node.js:

1. Try-catch block for synchronous operations
2. Error-first callbacks
3. Promises with .catch()
4. Try-catch with async/await

### How to handle errors in synchronous operations using try-catch-finally?
```javascript
try {
  // Synchronous code that might throw an error
  throw new Error('Something went wrong');
} catch (error) {
  // Error handling code
  console.error(error.message);
} finally {
  // Code that runs regardless of error
  console.log('This always executes');
}
```

### What is error-first callbacks?
Error-first callbacks are a pattern where the first parameter of a callback function is an error object. If an error occurs, it's passed as the first argument; otherwise, it's null.

```javascript
function asyncOperation(callback) {
  // If error occurs
  if (someError) {
    return callback(new Error('Error message'));
  }
  // If successful
  callback(null, data);
}

asyncOperation((error, data) => {
  if (error) {
    console.error(error);
    return;
  }
  console.log(data);
});
```

### How to handle errors using promises?
With promises, errors are handled using the `.catch()` method:

```javascript
function promiseOperation() {
  return new Promise((resolve, reject) => {
    if (success) {
      resolve(data);
    } else {
      reject(new Error('Operation failed'));
    }
  });
}

promiseOperation()
  .then(data => console.log(data))
  .catch(error => console.error(error));
```

### How to handle errors using async/await?
With async/await, try-catch blocks are used for error handling:

```javascript
async function asyncFunction() {
  try {
    const result = await promiseOperation();
    console.log(result);
  } catch (error) {
    console.error(error);
  }
}
```

### How can you debug Node.js applications?
Debugging techniques in Node.js:
1. Using console.log statements
2. Using the debugger statement
3. Node.js Inspector tools
4. Visual Studio Code debugger
5. Chrome Developer Tools

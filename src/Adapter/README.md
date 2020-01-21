# Ports & Adapters (Hexagonal Architecture)
I thought I explain what is the purpose of this Domain `Adapter`. In order to follow
the clean architecture design (The onion layers with having Dependency Inversion in
mind). I created this domain which could act as Adapter and Port to our Application.
Any other domains inside the `Adapter` could be considered the **Infrastructure layer**
in context of Domain Driven Design.


## CLI Component
CLI is consist of two main domains:
* Command: provides the adapter for creation of commands in our main domain e.g. `BeesInTrapCommand`.
    * IO (Input/Output): provides the adapter for commands input and output
* Console: provides the console to run the php commands
    * Plugins: provide helper services for console to format IO. Here we utilise one of symfony's
    helper `QuestionHelper`


## Use Case
If we wish to swap `Symfony Console` with another CLI dependency like `drupal-console`, we
don't need to modify the code inside the domain of our application, we could simply just
write a new adapter and inject that adapter to the main CLI component. This reduces
the hours of development and promotes decoupling from third party dependencies hence the
cleaner and more maintainable code.


## Other Scenarios e.g. Http Client, Databases and ..
For example if we wish to use HttpClient we could create a new domain `HttpClient` inside
the `Adapter` and create an adapter for Guzzle for example, and if we wish to use another
package like: `httpful` we could just create a new Adapter for new client (httpful) and
inject it to main `HttpClient` component.

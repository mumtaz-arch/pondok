flowchart TD
  A[Browser\nRequest] --> B[Show\nLanding Page]
  B --> C{Authenticated?}
  C -->|No| D[Login\nPage]
  C -->|Yes| E[Dashboard]
  E --> F[User\nManagement]
  E --> G[Data\nImport\n& Export]
  E --> H[Dynamic\nUI\nComponents]
  E --> I[Real-time\nNotifications]
  E --> J[Full-text\nSearch]
  E --> K[Media\nHandling]
  E --> L[Payment\nProcessing]
  E --> M[PDF\nGeneration]
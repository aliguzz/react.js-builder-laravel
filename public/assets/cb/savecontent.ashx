<%@ WebHandler Language="VB" Class="savecontent" %>

Imports System
Imports System.Web
Imports System.IO
Public Class savecontent : Implements IHttpHandler
 
    Public Sub ProcessRequest(ByVal context As HttpContext) Implements IHttpHandler.ProcessRequest
        context.Response.ContentType = "text/html"

        Dim sFile As String = "content.html"
                
        Dim sContent As String = context.Request("content")
        
        File.WriteAllText(context.Server.MapPath(".") & "\" & sFile, System.Uri.UnescapeDataString(sContent))
        
        context.Response.Write(System.Uri.UnescapeDataString(sContent))
    End Sub
 
    Public ReadOnly Property IsReusable() As Boolean Implements IHttpHandler.IsReusable
        Get
            Return False
        End Get
    End Property

End Class
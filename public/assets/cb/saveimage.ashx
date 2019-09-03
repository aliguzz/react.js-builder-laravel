<%@ WebHandler Language="VB" Class="saveimage" %>

Imports System
Imports System.Web
Imports System.IO

Public Class saveimage : Implements IHttpHandler
    
    'STEP 1: Specify storage folder
    Private sDir As String = "C:\ContentBuilder\assets\"
    
    'STEP 2: Specify url path
    Private sPath As String = "assets/"
    
    Public Sub ProcessRequest(ByVal context As HttpContext) Implements IHttpHandler.ProcessRequest
        context.Response.ContentType = "text/html"

        'Read image
        Dim count As String = context.Request.QueryString("count")
        Dim b64str As String = context.Request.Form("hidimg-" & count)
        Dim imgname As String = context.Request.Form("hidname-" & count)
        Dim imgtype As String = context.Request.Form("hidtype-" & count)

        'Generate random file name here
        Dim myRnd As New Random()
        Dim chars() As Char = New Char() {"A"c, "B"c, "C"c, "D"c, "E"c, "F"c, _
                                          "G"c, "H"c, "I"c, "J"c, "K"c, "L"c, _
                                          "M"c, "N"c, "O"c, "P"c, "Q"c, "R"c, _
                                          "S"c, "T"c, "U"c, "V"c, "W"c, "X"c, _
                                          "Y"c, "Z"c, "0"c, "1"c, "2"c, "3"c, _
                                          "4"c, "5"c, "6"c, "7"c, "8"c, "9"c, _
                                          "a"c, "b"c, "c"c, "d"c, "e"c, "f"c, _
                                          "g"c, "h"c, "i"c, "j"c, "k"c, "l"c, _
                                          "m"c, "n"c, "o"c, "p"c, "q"c, "r"c, _
                                          "s"c, "t"c, "u"c, "v"c, "w"c, "x"c, _
                                          "y"c, "z"c}
        Dim n As Integer = 5
        Dim rndStr As String = String.Empty
        Dim i As Integer = 0
        While i < n
            rndStr += chars(myRnd.Next(0, 62))
            System.Math.Max(System.Threading.Interlocked.Increment(i), i - 1)
        End While
        rndStr = rndStr & count
        'rndStr => random string
        Dim sImage As String
        If imgtype = "png" Then
            sImage = imgname & "-" & rndStr & ".png"
        Else
            sImage = imgname & "-" & rndStr & ".jpg"
        End If

        'Save image
        Dim binaryData() As Byte = Convert.FromBase64String(b64str)
        Dim fs As New FileStream(sDir & sImage, FileMode.Create)
        fs.Write(binaryData, 0, binaryData.Length)
        fs.Close()
        
        'Replace image src with the new saved file
        context.Response.Write("<html><body onload=""parent.document.getElementById('img-" & count & "').setAttribute('src','" & sPath & sImage & "');   parent.document.getElementById('img-" & count & "').removeAttribute('id');""></body></html>")
    End Sub
 
    Public ReadOnly Property IsReusable() As Boolean Implements IHttpHandler.IsReusable
        Get
            Return False
        End Get
    End Property

End Class
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
  <h2>Doctor Profile</h2>
      <xsl:for-each select="profile/doctor">
      <div style="background-color:teal;color:white;padding:4px">
      <span style="font-weight:bold">
      Doctor ID: <xsl:value-of select="id"/>
      </span>
      </div>
      <div style="margin-left:20px;margin-bottom:1em;font-size:10pt">
      <div>
        <xsl:element name="image">
                <img src="{image}"/>
        </xsl:element>
      </div>
      <p>Name: <xsl:value-of select="name"/></p>

      </div>
      <div style="margin-left:20px;margin-bottom:1em;font-size:10pt">
      <p>Speciality: <xsl:value-of select="speciality"/></p>
      </div>
      </xsl:for-each>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>

export const formatDate = (dateString) => {
  if (!dateString) return "";
  try {
    return new Intl.DateTimeFormat("id-ID", {
      day: "2-digit",
      month: "long",
      year: "numeric"
    }).format(new Date(dateString));
  } catch {
    return "";
  }
};
